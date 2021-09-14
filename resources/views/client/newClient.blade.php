@extends("blanc")

@section("contenu")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Nouveau client</h3></div>
                    <div class="card-body">
                        <form method="post" action="{{route('client.store')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="inputLastName">Nom complet</label>
                                    <input class="form-control" id="inputLastName" name="nomComplet" type="text" placeholder="Entrer votre nom complet" />
                                    @if ($errors->has('nomComplet'))
                                        <div class="text-danger">
                                            {{ $errors->first('nomComplet') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail">Numero de telephone</label>
                                <input class="form-control" id="num" name="num" type="tel" placeholder="Entrer votre numero de telephone" />
                                 @if ($errors->has('num'))
                                    <div class="text-danger">
                                        {{ $errors->first('num') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail">Adresse E-mail</label>
                                <input class="form-control" id="inputEmail" name="mail" type="email" placeholder="name@example" />
                                @if ($errors->has('mail'))
                                    <div class="text-danger">
                                        {{ $errors->first('mail') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6" >
                                    <div class="mb-3 mb-md-0">
                                        <label for="type">Type</label>
                                        <select name="type" id="type" class="selDiv form-control">
                                            <option value="personnel">Personnel</option>
                                            <option value="entreprise">Entreprise</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mb-md-0">
                                        <label for="entreprise">Nom de la structure</label>
                                        <input class="form-control" id="entreprise" name="entreprise" type="text" placeholder="Nom de la structure" class="disabled" />
                                         @if ($errors->has('entreprise'))
                                            <div class="text-danger">
                                                {{ $errors->first('entreprise') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="description" class="form-control" ></textarea>
                                <label for="inputEmail">Description</label>
                                @if ($errors->has('description'))
                                    <div class="text-danger">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
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
