<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index(){
        $Services = Service::all();
    }

    public function Service($id){
        $Service = Service::find($id);
    }

    public function newService(Request $request){

        $validator = Validator::make($request->all(), [

            'nom' => 'require',
            'prix' => 'require',
            'description' => 'nullable',

        ]);

        if ($validator->fails()) {
            return redirect('contact-form')
                        ->withErrors($validator)
                        ->withInput();
        } else {

            $service = new Service;

            $service -> nom = $request -> nom;
            $service -> prix = $request -> prix;
            $service -> description = $request -> description;

            $service -> save();

        }
    }


    public function updateService(Request $request){

        $validator = Validator::make($request->all(), [
            'nomComplet' =>'required',
            'num' => 'required',
            'mail' => 'required|email',
            'type' => 'required',
            'entreprise' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect('contact-form')
                        ->withErrors($validator)
                        ->withInput();
        } else {

            $Service = Service::find($request->id);

            $Service->update([
                'nomComplet' => $request -> nomComplet,
                'num' => $request -> num,
                'mail' => $request -> mail,
                'type' => $request -> type,
                'entreprise' => $request -> entreprise
            ]);

        }
    }

    public function deleteService(Request $request){

            $Service = Service::find($request->id);
            $Service -> destroy();

    }
}