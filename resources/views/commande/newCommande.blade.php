@extends("blanc")

@section("contenu")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Nouvelle commande</h3></div>
                    <div class="card-body">
                        <form method="post" action="{{route('commande.store')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-md-12">
                                    <label for="inputLastName">Client</label>
                                    <select name="client" id="type" class="selDiv form-control">
                                        @forelse ($clients as $client)
                                            <option value="{{$client->id}}"> {{$client->nomComplet}} </option>
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
                                            <option value="{{$pack->id}}"> {{$pack->nom . ' - ' . $pack->prix}} </option>
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
                            <div class="form-floating mb-3">
                                <textarea name="note" class="form-control" ></textarea>
                                <label for="inputEmail">Note personnnel</label>
                                @if ($errors->has('note'))
                                    <div class="text-danger">
                                        {{ $errors->first('note') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mt-4 mb-0">
                                <button type="submit" class="btn btn-primary">Ajouter la commande</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <script>

        $(document).ready(function(){
            $('#entreprise').prop('disabled', true);
            $("select.selDiv").change(function(){
                if ($(this).children("option:selected").val() == "personnel") {
                    $('#entreprise').prop('disabled', true);
                } else {
                    $('#entreprise').prop('disabled', false);
                }
            });
        });

    </script>

@endsection
