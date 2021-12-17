@extends('blanc')

@section('contenu')

<h1 class="mt-4">Clients</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Liste des clients</li>
    </ol>

    <div class="card mb-4 display">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Liste des clients
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($services as $service)
                        <tr>
                            <td> {{ $service->nom }} </td>
                            <td> {{ $service->prix }} </td>
                            <td> {{ $service->description }} </td>
                            <td class="justify-between">
                                <a href="{{route('service.edit', $service->id)}}" class="m-2"><i class="fa fa-edit"></i></a>
                                <a href="{{route('service.delete', $service->id)}}">
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

    <script>
        
@endsection
