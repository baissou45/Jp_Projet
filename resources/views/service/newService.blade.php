@extends("blanc")

@section("contenu")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Nouveau service</h3></div>
                    <div class="card-body">
                        <form method="post" action="{{route('service.store')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputLastName" name="nom" type="text" placeholder="Entrer le nom du service" />
                                        <label for="inputLastName">Nom</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="prix" name="prix" type="number" placeholder="Entrer votre numero de telephone" />
                                <label for="inputEmail">Prix</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="description" class="form-control" ></textarea>
                                <label for="inputEmail">Description</label>
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
@endsection
