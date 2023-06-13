@extends('adminlte::page')

@section('title', 'Modifier un immeuble')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Modifier un immeuble</h4>
        <a href="/immeubles" class="d-block btn btn-success">Immeubles</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/immeubles/{{$immeuble->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="">
                    <div class="form-group mb-4">
                        <label class="mb-2" for="nom">Nom : </label>
                        <input name="nom" id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $immeuble->nom) }}">
                        @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-2" for="adresse">Adresse : </label>
                        <input name="adresse" id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" value="{{ old('adresse', $immeuble->adresse) }}">
                        @error('adresse')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="form-group col-6">
                            <label class="mb-2" for="code_postal">Code Postal : </label>
                            <input name="code_postal" id="code_postal" type="text" class="form-control @error('code_postal') is-invalid @enderror" value="{{ old('code_postal', $immeuble->code_postal) }}">
                            @error('code_postal')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label class="" for="ville_id">Ville : </label>
                            <select name="ville_id" id="ville_id" class="form-control @error('ville_id') is-invalid @enderror">
                                <option value="">veuillez sélectionner le ville</option>
                                @foreach($villes as $ville)
                                    <option value="{{$ville->id}}" @selected(old('ville_id', $immeuble->ville_id) == $ville->id)>{{$ville->nom}}</option>
                                @endforeach
                            </select>
                            @error('ville_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="form-group col-4">
                            <label class="mb-2" for="nb_etages">Nombre d'étage : </label>
                            <input name="nb_etages" id="nb_etages" type="number" class="form-control @error('nb_etages') is-invalid @enderror" value="{{ old('nb_etages', $immeuble->nb_etages) }}">
                            @error('nb_etages')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-4">
                            <label class="mb-2" for="nb_logement">Nombre de Logement : </label>
                            <input name="nb_logements" id="nb_logements" type="number" class="form-control @error('nb_logements') is-invalid @enderror" value="{{ old('nb_logements', $immeuble->nb_logements) }}">
                            @error('nb_logements')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-4">
                            <label class="mb-2" for="annee_construction">Année de Construction : </label>
                            <input name="annee_construction" id="annee_construction" type="number" class="form-control @error('annee_construction') is-invalid @enderror" value="{{ old('annee_construction', $immeuble->annee_construction) }}">
                            @error('annee_construction')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="description">Description : </label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" style="height: 150px; resize:none;">{{ old('description', $immeuble->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="m-0 clearfix">
                        <input class="btn btn-primary float-right" type="submit" value="Modifier"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop

