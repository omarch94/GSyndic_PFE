@extends('adminlte::page')

@section('title', 'afficher un reclamation')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Afficher un Reclamation</h4>
        <a href="/reclamations" class="d-block btn btn-success">Reclamations</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="bg-white p-5">
        <ul class="mb-5 border rounded py-5">
            <li class="mb-3"><span>Type de réclamation : </span> {{$reclamation->typeReclamation->nom}}</li>
            <li class="mb-3"><span>Désignation : </span> {{$reclamation->designation}}</li>
            <li class="mb-3"><span>Date de réclamation : </span> {{$reclamation->date_reclamation}}</li>
            <li class="mb-3"><span>Copropriété : </span> {{$reclamation->copropriete->nom}}</li>
            <li class="mb-3"><span>L'immeuble : </span> {{$reclamation->copropriete->immeuble->nom}}</li>
            <li class="mb-3"><span>L'adresse : </span> {{$reclamation->copropriete->immeuble->adresse}}</li>
            <li class="mb-3"><span>Canal : </span> {{$reclamation->canal->nom}}</li>
            <li class="mb-3"><span>Réclamateur : </span> {{$reclamation->utilisateur->nom}} {{$reclamation->utilisateur->prenom}}</li>
            <li class="mb-3"><span>Statut : </span> {{$reclamation->statutReclamation->nom}}</li>
            <li class="mb-3"><span>Description : </span> {{$reclamation->description}}</li>
        </ul>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


