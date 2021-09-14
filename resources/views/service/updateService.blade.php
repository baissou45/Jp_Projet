@extends("blanc")

@section("contenu")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Mise à jour de service</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('service.update')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$service->id}}" i>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="inputLastName">Nom</label>
                                    <input class="form-control" value="{{$service->nom}}" id="inputLastName" name="nom" type="text" placeholder="Entrer le nom du service" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Prix</label>
                                <input class="form-control" id="prix" value="{{$service->prix}}" name="prix" type="number" placeholder="Entrer votre numero de telephone" />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Description</label>
                                <textarea name="description" class="form-control">{{$service->description}} </textarea>
                            </div>
                        <center>
                            <div class="mt-4 mb-0">
                                <button type="submit" class="btn btn-primary">Ajouter le service</button>
                            </div>
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
