@extends('adminlte::page')

@section('title', 'afficher un Charge')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Afficher un Charge</h4>
        <a href="/charges" class="d-block btn btn-success">charges</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="bg-white p-5">
        <ul class="mb-5 border rounded py-5">
            <li class="mb-3"><span>Type de Charge : </span> {{$charge->typeCharge->nom}}</li>
            <li class="mb-3"><span>Désignation : </span> {{$charge->designation}}</li>
            <li class="mb-3"><span>Date de Charge : </span> {{$charge->date}}</li>
            <li class="mb-3"><span>Montant : </span> {{$charge->montant}}</li>
            <li class="mb-3"><span>Copropriété : </span> {{$charge->copropriete->nom}}</li>
            <li class="mb-3"><span>Coproprietaire : </span> {{$charge->copropriete->coproprietaire->nom}} {{$charge->copropriete->coproprietaire->prenom}}</li>
            <li class="mb-3"><span>Statut : </span> {{$charge->statutCharge->nom}}</li>
            <li class="mb-3"><span>Description : </span> {{$charge->description}}</li>
        </ul>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


