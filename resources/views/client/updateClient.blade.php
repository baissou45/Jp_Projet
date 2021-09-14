@extends("blanc")

@section("contenu")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Nouveau client</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('client.update')}}">
                        @csrf

                        <input type="hidden" name="id" value=" {{$client->id}} ">

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input value=" {{$client->nomComplet}} " class="form-control" id="inputLastName" name="nomComplet" type="text"
                                        placeholder="Entrer votre nom complet" />
                                    <label for="inputLastName">Nom complet</label>
                                </div>
                                @if ($errors->has('nomComplet'))
                                    <div class="text-danger">
                                        {{ $errors->first('nomComplet') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input value="{{$client->num}}" maxlength="8" minlength="8" class="form-control" id="num" name="num" type="tel"
                                placeholder="Entrer votre numero de telephone" />
                            <label for="inputEmail">Numero de telephone</label>
                            @if ($errors->has('num'))
                                <div class="text-danger">
                                    {{ $errors->first('num') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-floating mb-3">
                            <input value=" {{$client->mail}} " class="form-control" id="inputEmail" name="mail" type="email"
                                placeholder="name@example" />
                            <label for="inputEmail">Adresse E-mail</label>
                            @if ($errors->has('mail'))
                                <div class="text-danger">
                                    {{ $errors->first('mail') }}
                                </div>
                            @endif
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select name="type" id="type" class="selDiv form-control">
                                        <option value="personnel" {{( ($client->type == 'personnel') ? 'selected' : "" )}} >Personnel</option>
                                        <option value="entreprise" {{( ($client->type == 'entreprise') ? 'selected' : "" )}} >Entreprise</option>
                                    </select>
                                    <label for="type">Type</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="entreprise" type="text"
                                        placeholder="Nom de la structure" class="disabled" />
                                    <label for="entreprise">Nom de la structure</label>
                                    @if ($errors->has('entreprise'))
                                        <div class="text-danger">
                                            {{ $errors->first('entreprise') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <button type="submit" class="btn btn-primary">Ajouter le client</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    $('#entreprise').prop('disabled', true);
    $("select.selDiv").change(function() {
        if ($(this).children("option:selected").val() == "personnel") {
            $('#entreprise').prop('disabled', true);
        } else {
            $('#entreprise').prop('disabled', false);
        }
    });
});
</script>

@endsection
