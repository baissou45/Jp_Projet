<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('service.index', compact('services'));
    }
    public function service($id){
        $service = Service::find($id);
    }

    public function add(){
        return view('service.newService');
    }

    public function edit($id){
        $service = Service::find($id);
        return view('service.updateService', compact('service'));
    }

    public function newService(Request $request){

        $validator = Validator::make($request->all(), [

            'nom' => 'required',
            'prix' => 'required',
            'description' => 'nullable',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            // dd($request->all());
            $service = new Service;

            $service -> nom = $request -> nom;
            $service -> prix = $request -> prix;
            $service -> description = $request -> description;

            $service -> save();

        return view('dashboard')->with('succes', 'Le service à été ajouter avec succes');
        }
    }


    public function updateService(Request $request){

        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prix' => 'required',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $service = Service::find($request->id);

            $service->update([
                'nom' => $request->nom,
                'prix' => $request->prix,
                'description' => $request->description,
            ]);

            return redirect()->route('dashbord')->with('succes', 'Le service à été ajouter avec succes');
        }
    }

    public function deleteService(Request $request){

            $service = Service::find($request->id);
            $service -> delete();
            return redirect()->route('service.index');

    }
}