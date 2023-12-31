<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    // orm - object relational mapper
    public function index(){
        $services = Service::paginate(12);

        // SELECT * FROM bams_db.services;
        // $services = Service::all();

        return view('services.index',[
            'services' => $services
        ]);
    }

    public function search(Request $request){
        $services = Service::where('service','like', '%' . $request->search . '%')->paginate(5);

        return view('services.index',[
                'services' => $services
        ]);
    }

    public function show($id){
        // SELECT * FROM bams_db.services WHERE id = 1;
        $service = Service::find($id);

        return view('services.show',[
            'service' => $service
        ]);
    }

    public function create(){
        if(Auth::user()->role_id==1){
            return view('services.create');
        }else{
            abort(404);
        }
    }

    public function store(Request $request){
        // INSERT INTO services (service,price,description)
        // VALUES ('service 4', 1000, 'Service 4 Description');
        //validate the input

         $validatedInputs = $request->validate([
                'service' => ['required', 'string', 'max:11'],
                'price' => 'required',
                'description' => 'required',
                'image' => 'nullable | mimes:jpg,jpeg,png | max:10240' //1MB = 1024KB
            ]);

            //upload image
            if($request->file('image')){
                $validatedInputs['image'] = $request->file('image')->store('public/images');
            }


        try{
            $service = Service::create($validatedInputs);
        }
        catch(\Exception $e){
            ddd($e);
        }

        return redirect('/service/'.$service->id)->with('success', 'Success!');

    }

    public function edit($id){
          if(Auth::user()->role_id==1){
              $service = Service::find($id);

              return view('services.edit',[
              'service' => $service
              ]);
          }else{
            abort(404);
          }
        // SELECT * FROM bams_db.services WHERE id = 1;

    }

    public function update($id, Request $request){
        // UPDATE services set service = 'new service',
        // price = 12313,
        // description = 'this is the description'
        // where id = 8;

        $validatedInputs = $request->validate([
          'service' => ['required', 'string', 'max:11'],
          'price' => 'required',
          'description' => 'required'
        ]);

        // Service::where('id', $id)
        // ->update([
        //     'service' => $request->service,
        //     'price' => $request->price,
        //     'description' => $request->description
        // ]);

       Service::where('id', $id)->update($validatedInputs);

        return back()->with('success', 'Success!');
    }

    public function destroy($id){

        // DELETE FROM services where id = 10;

        Service::where('id', $id)->delete();

        return redirect('/services')->with('success', 'Success!');

    }

}
