@extends('adminlte::page')

@section('title', 'Modifier un paiment')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Modifier un paiment</h4>
        <a href="/paiments" class="d-block btn btn-success">Paiments</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/paiments/{{$paiment->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="">

                    <div class="form-group mb-4">
                        <label class="mb-2" for="date_paiment">Date de paiment : </label>
                        <input name="date_paiment" id="date_paiment" type="date" class="form-control @error('date_paiment') is-invalid @enderror" value="{{ old('date_paiment', $paiment->date_paiment) }}">
                        @error('date_paiment')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="montant">Montant : </label>
                        <input name="montant" id="montant" type="text" class="form-control @error('montant') is-invalid @enderror" value="{{ old('montant', $paiment->montant) }}">
                        @error('montant')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="" for="mode_paiment_id">Mode de paiment : </label>
                        <select name="mode_paiment_id" id="mode_paiment_id" class="form-control @error('mode_paiment_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner le mode de paiment</option>
                            @foreach($mode_paiments as $mode_paiment)
                                <option value="{{$mode_paiment->id}}" @selected(old('mode_paiment_id', $paiment->mode_paiment_id) == $mode_paiment->id)>{{$mode_paiment->nom}}</option>
                            @endforeach
                        </select>
                        @error('mode_paiment_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="" for="facture_id">Facture : </label>
                        <select name="facture_id" id="facture_id" class="form-control @error('facture_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner la facture</option>
                            @foreach($factures as $facture)
                                <option value="{{$facture->id}}" @selected(old('facture_id', $paiment->facture_id) == $facture->id)>{{$facture->numero_facture}}</option>
                            @endforeach
                        </select>
                        @error('facture_id')
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


