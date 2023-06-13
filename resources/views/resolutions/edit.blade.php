@extends('adminlte::page')

@section('title', 'Modifier un resolution')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Modifier une réclamtion</h4>
        <a href="/resolutions" class="d-block btn btn-success">resolutions</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/resolutions/{{$resolution->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="">
                    <div class="form-group mb-4">
                        <label class="mb-2" for="type_resolution_id">Réclamation : </label>
                        <select name="reclamation_id" id="reclamation_id" class="form-control @error('reclamation_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner la réclamation</option>
                            @foreach($reclamations as $reclamation)
                                <option value="{{$reclamation->id}}" @selected(old('reclamation_id', $resolution->reclamation_id) == $reclamation->id)>{{$reclamation->designation}}</option>
                            @endforeach
                        </select>
                        @error('type_resolution_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="date_resolution">Date de Résolution : </label>
                        <input name="date_resolution" id="date_resolution" type="date" class="form-control @error('date_resolution') is-invalid @enderror" value="{{ old('date_resolution', $resolution->date_resolution) }}">
                        @error('date_resolution')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="" for="utilisateur_id">Fournisseur : </label>
                        <select name="utilisateur_id" id="utilisateur_id" class="form-control @error('utilisateur_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner le fournisseur</option>
                            @foreach($fournisseurs as $fournisseur)
                                <option value="{{$fournisseur->id}}" @selected(old('utilisateur_id', $resolution->utilisateur_id) == $fournisseur->id)>{{$fournisseur->nom}} {{$fournisseur->prenom}}</option>
                            @endforeach
                        </select>
                        @error('ville_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="description">Description : </label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" style="height: 150px; resize:none;">{{ old('description', $resolution->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="m-0 clearfix">
                        <input class="btn btn-primary float-right" type="submit" value="Ajouter"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop

