<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/text', 'service.newService');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', 'Controller@accueil')->name('dashbord');

    // Client routes
    Route::prefix("")->group(function () {

        Route::get('/client', 'ClientController@index')->name('client.index');

        Route::get('/nouveauClient', 'ClientController@add')->name('client.add');
        Route::post('/nouveauClient', 'ClientController@newClient')->name('client.store');

        Route::get('/editClient/id-{id}', 'ClientController@edit')->name('client.edit');
        Route::post('/editClient', 'ClientController@updateClient')->name('client.update');

        Route::get('/clientSup/{id}', 'ClientController@deleteClient')->name('client.delete');
    });


    // Routes services
    Route::prefix('')->group(function () {

        Route::get('/service', 'ServiceController@index')->name('service.index');

        Route::get('/nouveauService', 'ServiceController@add')->name('service.add');
        Route::post('/nouveauService', 'ServiceController@newService')->name('service.store');

        Route::get('/editService/id-{id}', 'ServiceController@edit')->name('service.edit');
        Route::post('/editService', 'ServiceController@updateService')->name('service.update');

        Route::get('/supressionService/{id}', 'ServiceController@deleteService')->name('service.delete');

    });


    // Routes pack
    Route::prefix('')->group(function () {

        Route::get('/pack', 'PackController@index')->name('pack.index');

        Route::get('/nouveauPack', 'PackController@add')->name('pack.add');
        Route::post('/nouveauPack', 'PackController@newPack')->name('pack.store');

        Route::get('/editPack/id-{id}', 'PackController@edit')->name('pack.edit');
        Route::post('/editPack', 'PackController@updatePack')->name('pack.update');

        Route::get('/quantite/{id}', 'PackController@addQuantite')->name('pack.quantite');
        Route::post('/quantite', 'PackController@storeQuantite')->name('pack.quantite.update');

        Route::get('/supressionPack/{id}', 'PackController@deletePack')->name('pack.delete');

    });


        // Routes commandes
        Route::prefix('')->group(function () {

            Route::get('/commande', 'PackController@index')->name('commande.index');

            Route::get('/nouveauCommande', 'CommandeController@add')->name('commande.add');
            Route::post('/nouveauCommande', 'CommandeController@newCommande')->name('commande.store');

            Route::get('/editCommande/id-{id}', 'CommandeController@edit')->name('commande.edit');
            Route::post('/editCommande', 'CommandeController@updateCommande')->name('commande.update');

            Route::get('/quantite/{id}', 'CommandeController@addQuantite')->name('commande.quantite');
            Route::post('/quantite', 'CommandeController@storeQuantite')->name('commande.quantite.update');

            Route::get('/supressionCommande/{id}', 'CommandeController@deleteCommande')->name('commande.delete');

        });


});