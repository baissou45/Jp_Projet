@extends("blanc")

@section("contenu")
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Nombre de client</div>
            <div class="card-footer justify-content-between">
                <center>
                   <h2> {{ count($clients) }} </h2>
                </center>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Nombre de Pack</div>
            <div class="card-footer justify-content-between">
                <center>
                    <h2> {{ count($packs) }} </h2>
                </center>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Nombre de Services </div>
            <div class="card-footer justify-content-between">
                <center>
                    <h2> {{ count($services) }} </h2>
                </center>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Commande en cours</div>
            <div class="card-footer justify-content-between">
                <center>
                    <h2> {{ $nbrCommande }} </h2>
                </center>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Derniers enregistrements
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

{{-- {{dd(session)}} --}}

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="{{asset('template/js/toat.js')}}"></script>

<script>
    $(function() {
        @if(Session::has('succes'))
            toastr.success("{{ Session::get('success') }}");
        @endif
    });
</script>

@endsection
