@extends("blanc")

@section("contenu")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Modification de commande</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('commande.update')}}">
                        @csrf
                        <input type="hidden" name="id" value=" {{$commande->id}} ">
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label for="inputLastName">Client</label>
                                <select name="client" id="type" class="selDiv form-control">
                                    @forelse ($clients as $client)
                                        <option {{ ($client->id == $commande->client_id) ? "selected" : '' }}> {{$client->nomComplet}} </option>
                                    @empty
                                        <center> Aucun client trouvé </center>
                                    @endforelse
                                </select>
                                @if ($errors->has('client'))
                                    <div class="text-danger">
                                        {{ $errors->first('client') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label for="inputLastName">Pack</label>
                                <select name="pack" id="pack" class="selDiv form-control">
                                    @forelse ($packs as $pack)
                                        <option {{ ($pack->id == $commande->pack_id) ? "selected" : '' }}> {{$pack->nom . ' - ' . $pack->prix}} </option>
                                    @empty
                                        <center> Aucun pack trouvé </center>
                                    @endforelse
                                </select>
                                @if ($errors->has('pack'))
                                    <div class="text-danger">
                                        {{ $errors->first('pack') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label for="inputLastName">Etat</label>
                                <select name="etat" class="selDiv form-control">
                                    <option {{ ($commande->etat == 'En cours') ? 'selected' : ""}} value="En cours"> En cours</option>
                                    <option {{ ($commande->etat == 'Fini') ? 'selected' : ""}} value="Fini"> Fini</option>
                                    <option {{ ($commande->etat == 'Annuler') ? 'selected' : ""}} value="Annuler"> Annuler</option>
                                </select>
                                @if ($errors->has('etat'))
                                    <div class="text-danger">
                                        {{ $errors->first('etat') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="note" class="form-control" ></textarea>
                            <label for="inputEmail">Note personnnel</label>
                            @if ($errors->has('note'))
                                <div class="text-danger">
                                    {{ $errors->first('note') }}
                                </div>
                            @endif
                        </div>
                        <center>
                            <div class="mt-4 mb-0">
                                <button type="submit" class="btn btn-primary">Modifier la commande</button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
