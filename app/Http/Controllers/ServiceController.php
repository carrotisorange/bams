<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(){

    }

    public function show($id){
        ddd($id);
    }

    public function create(Request $request){
        ddd('this is create');
    }

    public function store(Request $request){
        
    }

    public function edit($id){
        ddd($id);
    }

    public function update($id, Request $request){

    }

    public function destroy($id){

    }

}
