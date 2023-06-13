@extends('adminlte::page')

@section('title', 'Modifier un reclamation')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Modifier une réclamtion</h4>
        <a href="/reclamations" class="d-block btn btn-success">reclamations</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/reclamations/{{$reclamation->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="">
                    <div class="form-group mb-4">
                        <label class="mb-2" for="type_reclamation_id">Type de réclamation : </label>
                        <select name="type_reclamation_id" id="type_reclamation_id" class="form-control @error('type_reclamation_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner le type de réclamation</option>
                            @foreach($type_reclamations as $type_reclamation)
                                <option value="{{$type_reclamation->id}}" @selected(old('type_reclamation_id', $reclamation->type_reclamation_id) == $type_reclamation->id)>{{$type_reclamation->nom}}</option>
                            @endforeach
                        </select>
                        @error('type_reclamation_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="designation">Désignation : </label>
                        <input name="designation" id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" value="{{ old('designation', $reclamation->designation) }}">
                        @error('designation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="date_reclamation">Date de Réclamation : </label>
                        <input name="date_reclamation" id="date_reclamation" type="date" class="form-control @error('date_reclamation') is-invalid @enderror" value="{{ old('date_reclamation', $reclamation->date_reclamation) }}">
                        @error('date_reclamation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="" for="canal_id">Canal : </label>
                        <select name="canal_id" id="canal_id" class="form-control @error('canal_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner le canal</option>
                            @foreach($canals as $canal)
                                <option value="{{$canal->id}}" @selected(old('canal_id', $reclamation->canal_id) == $canal->id)>{{$canal->nom}}</option>
                            @endforeach
                        </select>
                        @error('ville_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="" for="copropriete_id">Copropriété : </label>
                        <select name="copropriete_id" id="copropriete_id" class="form-control @error('copropriete_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner le copropriété</option>
                            @foreach($coproprietes as $copropriete)
                                <option value="{{$copropriete->id}}" @selected(old('copropriete_id', $reclamation->copropriete_id) == $copropriete->id)>{{$copropriete->nom}}</option>
                            @endforeach
                        </select>
                        @error('copropriete_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="description">Description : </label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" style="height: 150px; resize:none;">{{ old('description', $reclamation->description) }}</textarea>
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

