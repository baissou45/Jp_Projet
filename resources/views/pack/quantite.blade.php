@extends("blanc")

@section("contenu")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Nouveau pack</h3></div>
                    <div class="card-body">
                        <form method="post" action="{{route('quantite.update')}}">
                            @csrf

                            <input type="text" value="{{$pack->id}}" name="packId" hidden>

                            @foreach ($pack->services as $service)
                                <div class="row form-groupe mt-2">
                                    <input class="form-control col-md-6" type="text" value="{{$service->nom}}" disabled>
                                    <input class="form-control col-md-4 ml-2" type="number" name="quantite[]" value="1">
                                </div>
                            @endforeach

                            <center>
                                <button type="submit" class="btn btn-primary mt-3">Ajouter le pack</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
