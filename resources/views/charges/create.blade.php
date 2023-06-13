@extends('adminlte::page')

@section('title', 'Ajouter un charge')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Ajouter un nouvau charge</h4>
        <a href="/charges" class="d-block btn btn-success">charges</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/charges" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <div class="form-group mb-4">
                        <label class="mb-2" for="type_charge_id">Type de Charge : </label>
                        <select name="type_charge_id" id="type_charge_id" class="form-control @error('type_charge_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner le type de Charge</option>
                            @foreach($type_charges as $type_charge)
                                <option value="{{$type_charge->id}}" @selected(old('type_charge_id') == $type_charge->id)>{{$type_charge->nom}}</option>
                            @endforeach
                        </select>
                        @error('type_charge_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="designation">Désignation : </label>
                        <input name="designation" id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" value="{{ old('designation') }}">
                        @error('designation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="date">Date de Charge : </label>
                        <input name="date" id="date" type="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}">
                        @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="montant">Montant : </label>
                        <input name="montant" id="montant" type="text" class="form-control @error('montant') is-invalid @enderror" value="{{ old('montant') }}">
                        @error('montant')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="" for="copropriete_id">Copropriété : </label>
                        <select name="copropriete_id" id="copropriete_id" class="form-control @error('copropriete_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner le copropriété</option>
                            @foreach($coproprietes as $copropriete)
                                <option value="{{$copropriete->id}}" @selected(old('copropriete_id') == $copropriete->id)>{{$copropriete->nom}}</option>
                            @endforeach
                        </select>
                        @error('copropriete_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="" for="statut_charge_id">Statut : </label>
                        <select name="statut_charge_id" id="statut_charge_id" class="form-control @error('statut_charge_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner le copropriété</option>
                            @foreach($statut_charges as $statut_charge)
                                <option value="{{$statut_charge->id}}" @selected(old('statut_charge_id') == $statut_charge->id)>{{$statut_charge->nom}}</option>
                            @endforeach
                        </select>
                        @error('statut_charge_id')
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
                        <input class="btn btn-primary float-right" type="submit" value="Ajouter"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop

