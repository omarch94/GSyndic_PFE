@extends('adminlte::page')

@section('title', 'afficher un facture')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Afficher un Facture</h4>
        <a href="/factures" class="d-block btn btn-success">Factures</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="bg-white p-5">
        <ul class="mb-5 border rounded py-5">
            <li class="mb-3"><span>Numéro de facture : </span> {{$facture->numero_facture}}</li>
            <li class="mb-3"><span>Date d'émission : </span> {{$facture->date_emission}}</li>
            <li class="mb-3"><span>Date d'écheance : </span> {{$facture->date_echeance}}</li>
            <li class="mb-3"><span>Montant Total : </span> {{$facture->montant_total}}</li>
            <li class="mb-3"><span>Copropriété : </span> {{$facture->copropriete->nom}} {{$facture->copropriete->prenom}}</li>
            <li class="mb-3"><span>Charge : </span> {{$facture->charge->designation}}</li>
            <li class="mb-3"><span>état du facture : </span> {{$facture->etatFacture->nom}}</li>
            <li class="mb-3"><span>Description : </span> {{$facture->description}}</li>
        </ul>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


