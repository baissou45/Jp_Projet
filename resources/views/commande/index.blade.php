@extends('blanc')

@section('style')
{{-- <style>
.dt-buttons {
    display: none;
}
.pull-left ul {
    list-style: none;
    margin: 0;
    padding-left: 0;
}
.pull-left a {
    text-decoration: none;
    color: #ffffff;
}
.pull-left li {
    color: #ffffff;
    background-color: #2f2f2f;
    border-color: #2f2f2f;
    display: block;
    float: left;
    position: relative;
    text-decoration: none;
    transition-duration: 0.5s;
    padding: 12px 30px;
    font-size: .75rem;
    font-weight: 400;
    line-height: 1.428571;
}
.pull-left li:hover {
    cursor: pointer;
}
.pull-left ul li ul {
    visibility: hidden;
    opacity: 0;
    min-width: 9.2rem;
    position: absolute;
    transition: all 0.5s ease;
    margin-top: 8px;
    left: 0;
    display: none;
}
.pull-left ul li:hover>ul,
.pull-left ul li ul:hover {
    visibility: visible;
    opacity: 1;
    display: block;
}
.pull-left ul li ul li {
    clear: both;
    width: 100%;
    color: #ffffff;
}
.ul-dropdown {
    margin: 0.3125rem 1px !important;
    outline: 0;
}
.firstli {
    border-radius: 0.2rem;
}
.firstli .material-icons {
    position: relative;
    display: inline-block;
    top: 0;
    margin-top: -1.1em;
    margin-bottom: -1em;
    font-size: 0.8rem;
    vertical-align: middle;
    margin-right: 5px;
}
</style> --}}

@endsection

@section('contenu')

<h1 class="mt-4">Commandes</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a  href="{{route('dashbord')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Liste des commandes</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Liste des commandes
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Pack</th>
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
                        <th>Pack</th>
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
                            <td> {{ $commande->pack->nom }} </td>
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

    @section('script')
    {{-- <script>
        $(document).ready(function() {

            $('#datatablesSimple').DataTable({
                dom: "Blfrtip",
                    buttons: [
                        {
                            text: 'csv',
                            extend: 'csvHtml5',
                        },
                        {
                            text: 'excel',
                            extend: 'excelHtml5',
                        },
                        {
                            text: 'pdf',
                            extend: 'pdfHtml5',
                        },
                        {
                            text: 'print',
                            extend: 'print',
                        },  
                    ],
                columnDefs: [{
                    orderable: false,
                    targets: -1
                }] 
            });


            $("ul li ul li").click(function() {
                var i = $(this).index() + 1
                var table = $('#quiztable').DataTable();
                if (i == 1) {
                    table.button('.buttons-csv').trigger();
                } else if (i == 2) {
                    table.button('.buttons-excel').trigger();
                } else if (i == 3) {
                    table.button('.buttons-pdf').trigger();
                } else if (i == 4) {
                    table.button('.buttons-print').trigger();
                } 
            });
            
            
        });
    </script> --}}
    @endsection