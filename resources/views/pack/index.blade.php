@extends('blanc')

@section('contenu')

<h1 class="mt-4">Packs</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('dashbord')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Liste des packs</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Liste des packs
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nom </th>
                        <th>Prix</th>
                        <th>Description</th>
                        <th>Services</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nom </th>
                        <th>Prix</th>
                        <th>Description</th>
                        <th>Services</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($packs as $pack)
                        <tr>
                            <td> {{ $pack->nom }} </td>
                            <td> <span class="text-success"> {{ $pack->prix }} fcfa</span> </td>
                            <td> {{ $pack->description }} </td>
                            <td>
                                <ul>
                                    @forelse ($pack->services as $service)
                                        <li> {{ $service->nom . ' - ' }} <span class="text-success"> {{ $service->prix . ' fcfa' }} </span> </li>
                                    @empty
                                        <span class="text-primary">Aucun service n'est rattaché à ce pack</span>
                                    @endforelse
                                </ul>
                            </td>
                            <td class="justify-between">
                                <a href="{{route('pack.edit', $pack->id)}}" class="m-2"><i class="fa fa-edit"></i></a>
                                <a href="{{route('pack.delete', $pack->id)}}">
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
