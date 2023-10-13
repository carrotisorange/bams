<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    // orm - object relational mapper
    public function index(){
        // SELECT * FROM bams_db.services;
        $services = Service::all();

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

        return view('services.create');
    }

    public function store(Request $request){
        // INSERT INTO services (service,price,description)
        // VALUES ('service 4', 1000, 'Service 4 Description');

        $request->validate([
            'service' => ['required', 'string', 'max:255'],
            'price' => 'required',
            'description' => 'required'
        ]);

        Service::create([
            'service' => $request->service,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return back()->with('success', 'Success!');

    }

    public function edit($id){
        ddd($id);
    }

    public function update($id, Request $request){

    }

    public function destroy($id){
        
    }

}
