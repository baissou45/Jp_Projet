@extends('blanc')

@section('contenu')

<h1 class="mt-4">Commandes</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Liste des commandes</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Liste des commandes
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Contact client</th>
                        <th>Utilisateur</th>
                        <th>Prix</th>
                        <th>Etat</th>
                        <th>Date commande</th>
                        <th>Note personnelle</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Client</th>
                        <th>Contact client</th>
                        <th>Utilisateur</th>
                        <th>Prix</th>
                        <th>Etat</th>
                        <th>Date commande</th>
                        <th>Note personnelle</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($commandes as $commande)
                        <tr>
                            <td> {{ $commande->client->nomComplet }} </td>
                            <td> {{ $commande->client->num }} </td>
                            <td> {{ $commande->user->name }} </td>
                            <td> {{ $commande->pack->prix }} </td>
                            <td class=" {{ ($commande->etat == 'Fini') ? 'text-success' : ( ($commande->etat == 'Annuler') ? 'text-danger' : 'text-primary' ) }} "> {{ $commande->etat }} </td>
                            <td> {{ $commande->created_at }} </td>
                            <td> {{ ($commande->note ) ? $commande->note : "Aucune note"}} </td>
                            <td class="justify-between">
                                <a href="{{route('commande.edit', $commande->id)}}" class="m-2"><i class="fa fa-edit"></i></a>
                                <a href="{{route('commande.delete', $commande->id)}}">
                                    <i class="fa fa-trash" id="remove"></i>
                                </a>
                            </td>
                        </tr>
                    @empty

                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
