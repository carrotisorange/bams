<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use DB;
use App\Models\Pet;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\PetCategory;
use App\Models\Location;
use App\Models\ModeOfPayment;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($serviceId)
    {
        $service = Service::find($serviceId);

        $petCategories = PetCategory::all();
        $funeralLocations = Location::all();
        $modeOfPayments = ModeOfPayment::all();

        return view('pets.create',[
           'service' => $service,
           'petCategories' => $petCategories,
           'funeralLocations' => $funeralLocations,
           'modeOfPayments' => $modeOfPayments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $serviceId)
    {
        $validatedInputs = $request->validate([
            'service_id' => ['required'],
            'name' => 'required',
            'pet_category_id' => 'required',
            'date_of_death' => 'required',
            'location_id'=> 'required_if:service_id,1',
            'mode_of_payment_id' => 'required'
        ]);

        try {
            DB::beginTransaction();
            //store pet
            $newPet = Pet::create([
                'name' => $request->name,
                'pet_category_id' => $request->pet_category_id,
                'date_of_death' => $request->date_of_death
            ]);

            //store transaction
            $newTransaction = Transaction::create([
                'service_id' => $request->service_id,
                'date' => Carbon::now(),
                'amount' => Service::find($request->serviceId)->price,
                'pet_id' => $newPet->id,
                'owner_id' => Auth::user()->id,
                'location_id' => $request->location_id
            ]);

            //update location if the service is not funeral
            if($request->service_id != 1){
                Transaction::where('id', $newTransaction->id)
                ->update([
                    'location_id' => 14
                ]);
            }

            //store the payment
            Payment::create([
                'owner_id' => Auth::user()->id,
                'transaction_id' => $newTransaction->id,
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'status' => 'pending',
                'mode_of_payment_id' => $request->mode_of_payment_id,
                'amount' => $newTransaction->amount
            ]);

            DB::commit();

            return redirect('/home')->with('success', 'Success!');
        // });
        }
        catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', $e);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
