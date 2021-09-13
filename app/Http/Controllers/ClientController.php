<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{


    public function index(){
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }

    public function client($id){
        $client = Client::find($id);
    }

    public function add(){
        return view('client.newClient');
    }

    public function edit($id){
        $client = Client::find($id);
        return view('client.updateClient', compact('client'));
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
            dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $client = new Client;

            $client -> nomComplet = $request -> nomComplet;
            $client -> num = $request -> num;
            $client -> mail = $request -> mail;
            $client -> type = $request -> type;
            $client -> entreprise = $request -> entreprise;

            $client -> save();
        }

        return view('dashboard')->with('succes', 'Le client à été ajouter avec succes');
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
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $client = Client::find($request->id);

            $client->update([
                'nomComplet' => $request -> nomComplet,
                'num' => $request -> num,
                'mail' => $request -> mail,
                'type' => $request -> type,
                'entreprise' => $request -> entreprise
            ]);

            return view('dashboard')->with('succes', 'Le client à été modifier avec succes');
        }
    }

    public function deleteClient($id){

            $client = Client::find($id);
            $client -> delete();
            return redirect()->route('client.index');

    }


}