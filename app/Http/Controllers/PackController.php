<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackController extends Controller
{
    public function index(){
        $packs = Pack::all();
        return view('pack.index', compact('packs'));
    }

    public function add(){
        $services = Service::all();
        return view('pack.newPack', compact('services'));
    }

    public function edit($id){
        $pack = Pack::find($id);
        return view('pack.updatePack', compact('pack'));
    }

    public function newPack(Request $request){

        $validator = Validator::make($request->all(), [

            'nom' => 'required',
            'service[]' => 'nullable',
            'description' => 'nullable',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $pack = new Pack;

            $pack -> nom = $request -> nom;
            $pack -> prix = 0;
            $pack -> description = $request -> description;

            $prix = 0;

            dd($request->all());
            $pack -> save();

            for ($i = 0 ; $i < count($request->service); $i++) {
                $pack->services()->attach($request->service[$i]);

                $service = Service::find($request->service[$i]);
                $prix += $service->prix;
            }

            $pack -> update(['prix' => $prix]);

            return redirect()->route('pack.quantite', $pack->id)->with('succes', 'Le pack à été créer avec succes');
        }
    }

    public function addQuantite($id){
        $pack = Pack::find($id);
        return view('pack.quantite', compact('pack'));
    }

    public function storeQuantite(Request $request){

        $pack = Pack::find($request->packId);

        for ($i= 0; $i < count($pack->services); $i++) {
            $pack->services()->updateExistingPivot(
                $pack->services[$i]->id, [ 'quantite' => $request->quantite[$i] ]
            );
        }

        return view('blanc');
    }


    public function updatePack(Request $request){

        $validator = Validator::make($request->all(), [

            'nom' => 'required',
            'service[]' => 'nullable',
            'description' => 'nullable',
            'prix' => 'nullable',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
                } else {

            $pack = Pack::find($request->id);

            $pack->update([
                'nom' => $request-> nom,
                'description' => $request-> description,
            ]);

            if ($request-> prix != null) {
                $pack -> update(['prix' => $request-> prix]);
            }

            for ($i= 0; $i < count($pack->services); $i++) {
                $pack->services()->detach($pack->services[$i]->id);
            }

            for ($i=0; $i < count($request->service); $i++) {
                $pack->services()->attach($request->service[$i]);
            }

            return redirect()->route('pack.quantite', $pack->id)->with('succes', 'Le pack à été créer avec succes');

        }
    }

    public function deletePack(Request $request){

            $pack = Pack::find($request->id);
            $pack -> delete();
            return redirect()->route('pack.index');

    }
}