@extends('adminlte::page')

@section('title', 'Ajouter un reunion')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Ajouter un nouvau PV</h4>
        <a href="/reunions" class="d-block btn btn-success">Reunions</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/reunions" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <div class="form-group mb-4">
                        <label class="mb-2" for="sujet">Sujet : </label>
                        <input name="sujet" id="sujet" type="text" class="form-control @error('sujet') is-invalid @enderror" value="{{ old('sujet') }}">
                        @error('sujet')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-2" for="date">Date : </label>
                        <input name="date" id="date" type="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}">
                        @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="form-group col-6">
                            <label class="mb-2" for="heure_debut">Heure de début : </label>
                            <input name="heure_debut" id="heure_debut" type="time" class="form-control @error('heure_debut') is-invalid @enderror" value="{{ old('heure_debut') }}">
                            @error('heure_debut')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label class="mb-2" for="phone">Heure de fin : </label>
                            <input name="heure_fin" id="heure_fin" type="time" class="form-control @error('heure_fin') is-invalid @enderror" value="{{ old('heure_fin') }}">
                            @error('heure_fin')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="" for="immeuble_id">Immeuble : </label>
                        <select name="immeuble_id" id="immeuble_id" class="form-control @error('immeuble_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner l'immeuble</option>
                            @foreach($immeubles as $immeuble)
                                <option value="{{$immeuble->id}}" @selected(old('immeuble_id') == $immeuble->id)>{{$immeuble->nom}}</option>
                            @endforeach
                        </select>
                        @error('ville_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="description">Description : </label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" style="height: 150px; resize:none;">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="m-0 clearfix">
                        <input class="btn btn-primary float-right" type="submit" value="Ajouter" />
                        {{-- <a href="/reunions/generate-pdf" class="d-block btn btn-success">Nouveau PV</a> --}}
                        
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop
@section('javascript')
<script>
    function generatePDFConfirmation() {
      var confirmation = confirm("Are you sure you want to generate the PDF?");
      if (confirmation) {
        // If the user confirms, perform the action
        window.location.href = "/reunions/generate-pdf";
      } else {
        // If the user cancels, do nothing
        return false;
      }
    }
  </script>
@stop