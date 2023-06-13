@extends('adminlte::page')

@section('title', 'afficher un copropriété')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Afficher un Copropriété</h4>
        <a href="/coproprietes" class="d-block btn btn-success">Copropriétés</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="bg-white p-5">
        <ul class="mb-5 border rounded py-5">
            <li class="mb-3"><span>Nom : </span> {{$copropriete->nom}}</li>
            <li class="mb-3"><span>Adresse : </span> {{$copropriete->adresse}}</li>
            <li class="mb-3"><span>Code Postal : </span> {{$copropriete->code_postal}}</li>
            <li class="mb-3"><span>Ville : </span> {{$copropriete->ville->nom}}</li>
            <li class="mb-3"><span>Interface : </span> {{$copropriete->interface}}</li>
            <li class="mb-3"><span>Nombre de lots : </span> {{$copropriete->nb_lots}}</li>
            <li class="mb-3"><span>Date de création : </span> {{$copropriete->date_creation}}</li>
            <li class="mb-3"><span>Date de Modification : </span> {{$copropriete->date_modification}}</li>
            <li class="mb-3"><span>Immeuble : </span> {{$copropriete->immeuble->nom}}</li>
            <li class="mb-3"><span>Copropriétaire : </span> {{$copropriete->coproprietaire->nom}} {{$copropriete->coproprietaire->prenom}}</li>
            <li class="mb-3"><span>Description : </span> {{$copropriete->description}}</li>
        </ul>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


