<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Service;
use App\Models\Pack;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function accueil(){
        $clients = Client::all();
        $commandes = Commande::limit(5)->orderBy('id', 'desc')->get();
        $services = Service::all();
        $packs = Pack::all();

        $attenteCommande = Commande::where('etat', "En cours")->get();
        $nbrCommande = count($attenteCommande);

        return view('accueil', compact('clients','commandes','services','packs', 'nbrCommande'));
    }
}