@extends('blanc')

@section('contenu')

<h1 class="mt-4">Clients</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a  href="{{route('dashbord')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Liste des clients</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Liste des clients
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom complet</th>
                        <th>Numero</th>
                        <th>Mail</th>
                        <th>TYpe</th>
                        <th>Entreprise</th>
                        <th>Nombre de commande</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nom complet</th>
                        <th>Numero</th>
                        <th>Mail</th>
                        <th>Type</th>
                        <th>Entreprise</th>
                        <th>Nombre de commande</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($clients as $client)
                        <tr>
                            <td> {{ $client->nomComplet }} </td>
                            <td> {{ $client->num }} </td>
                            <td> {{ $client->mail }} </td>
                            <td> {{ $client->type }} </td>
                            <td class="{{ ($client->type != 'personnel') ? 'text-success' : 'text-primary' }}"> {{ ($client->type != 'personnel') ? $client->entreprise : "Aucun"}} </td>
                            <td> {{ $client->commandes->count() }} </td>
                            <td class="justify-between">
                                <a href="{{route('client.edit', $client->id)}}" class="m-2"><i class="fa fa-edit"></i></a>
                                <a href="{{route('client.delete', $client->id)}}">
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
