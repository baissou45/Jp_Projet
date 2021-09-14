@extends("blanc")

@section("contenu")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Modification de pack</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('pack.update')}}">
                        @csrf

                        <input type="hidden" name="id" value="{{$pack->id}}">

                        @csrf
                            <div class="row mb-3">
                                <div class="col-md-12 form-group">
                                    <label for="inputLastName">Nom pack</label>
                                    <input class="form-control" value="{{$pack->nom}}" id="inputLastName" name="nom" type="text" />
                                    @if ($errors->has('nom'))
                                        <div class="text-danger">
                                            {{ $errors->first('nom') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 form-group" >
                                    <div class="mb-3 mb-md-0">
                                        <label for="type">Services </label>
                                        <select name="service[]" class="selectpicker" multiple data-live-search="true">
                                            @forelse ($services as $service)
                                                <option value="{{ $service->id }}"> {{ $service->nom }}</option>
                                            @empty
                                                <center>Aucun service trouver</center>
                                            @endforelse
                                        </select>
                                    </div>
                                    @if ($errors->has('service[]'))
                                        <div class="text-danger">
                                            {{ $errors->first('service[]') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail">Description</label>
                                <textarea name="description" class="form-control" >{{$pack->description}}</textarea>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-primary">Modifier le pack</button>
                            </center>
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
