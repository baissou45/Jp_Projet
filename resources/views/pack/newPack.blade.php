@extends("blanc")

@section("contenu")

    @php
        $contenu = [];
    @endphp

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Nouveau pack</h3></div>
                    <div class="card-body">
                        <form method="post" action="{{route('pack.store')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12 form-group">
                                    <label for="inputLastName">Nom pack</label>
                                    <input class="form-control" id="inputLastName" name="nom" type="text" />
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
                                <textarea name="description" class="form-control" ></textarea>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-primary">Ajouter le pack</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
