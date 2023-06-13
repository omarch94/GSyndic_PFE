@extends('adminlte::page')

@section('title', 'afficher un immeuble')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Afficher un Immeuble</h4>
        <a href="/immeubles" class="d-block btn btn-success">Immeubles</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="bg-white p-5">
        <ul class="mb-5 border rounded py-5">
            <li class="mb-3"><span>Nom : </span> {{$immeuble->nom}}</li>
            <li class="mb-3"><span>Adresse : </span> {{$immeuble->adresse}}</li>
            <li class="mb-3"><span>Code Postal : </span> {{$immeuble->code_postal}}</li>
            <li class="mb-3"><span>Ville : </span> {{$immeuble->ville->nom}}</li>
            <li class="mb-3"><span>Nombre d'étage : </span> {{$immeuble->nb_etages}}</li>
            <li class="mb-3"><span>Nombre de logement : </span> {{$immeuble->nb_logements}}</li>
            <li class="mb-3"><span>Année de construction : </span> {{$immeuble->annee_construction}}</li>
            <li class="mb-3"><span>Description : </span> {{$immeuble->description}}</li>
        </ul>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


