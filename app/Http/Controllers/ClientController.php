<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{


    public function index(){
        $clients = Client::all();
    }

    public function client($id){
        $client = Client::find($id);

    }

    public function newClient(Request $request){

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

            $client = new Client;

            $client -> nomComplet = $request -> nomComplet;
            $client -> num = $request -> num;
            $client -> mail = $request -> mail;
            $client -> type = $request -> type;
            $client -> entreprise = $request -> entreprise;

            $client -> save();

        }
    }


    public function updateClient(Request $request){

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

            $client = Client::find($request->id);

            $client->update([
                'nomComplet' => $request -> nomComplet,
                'num' => $request -> num,
                'mail' => $request -> mail,
                'type' => $request -> type,
                'entreprise' => $request -> entreprise
            ]);

        }
    }

    public function deleteClient(Request $request){

            $client = Client::find($request->id);
            $client -> destroy();

        }


}