<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Pack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommandeController extends Controller
{
    public function index(){
        $commandes = Commande::all();
        return view('commande.index', compact('commandes'));
    }

    public function commande($id){
        $commande = Commande::find($id);
    }

    public function add(){
        $packs = Pack::all();
        $clients = Client::all();

        return view('commande.newCommande', compact('packs', 'clients'));
    }

    public function edit($id){
        $commande = Commande::find($id);
        $packs = Pack::all();
        $clients = Client::all();

        return view('commande.updateCommande', compact('commande', 'clients', 'packs'));
    }

    public function newCommande(Request $request){
        $validator = Validator::make($request->all(), [
            'client' =>'required',
            'pack' => 'required',
            'note' => 'nullable',
        ]);

        if ($validator->fails()) {
            // dd($request->all(), $validator);
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $commande = new Commande;

            $commande -> client_id =  $request -> client;
            $commande -> pack_id =  $request -> pack;
            $commande -> note =  $request -> note;
            $commande -> user_id =  auth()->user()->id;
            $commande -> etat = "En cours";

            $commande -> save();
        }

        return redirect()->route('dashbord')->with('succes', 'Le commande à été ajouter avec succes');
    }


    public function updateCommande(Request $request){

        $validator = Validator::make($request->all(), [
            'client' =>'required',
            'pack' => 'required',
            'note' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $commande = Commande::find($request->id);

            if ($request->etat) {
                $commande -> update(['etat' =>  $request -> etat]);
            }

            if ($request->note) {
                $commande -> update(['note' =>  $request -> note]);
            }

            if ($request->client) {
                $commande -> update(['client' =>  $request -> client]);
            }

            if ($request->pack) {
                $commande -> update(['pack' =>  $request -> pack]);
            }
                // dd($commande, $request -> etat);

            return redirect()->route('dashbord')->with('succes', 'Le commande à été modifier avec succes');
        }
    }

    public function deleteCommande($id){

            $commande = Commande::find($id);
            $commande -> delete();
            return redirect()->route('commande.index');

    }

}