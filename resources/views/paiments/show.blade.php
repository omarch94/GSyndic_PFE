@extends('adminlte::page')

@section('title', 'afficher un paiment')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Afficher un Paiment</h4>
        <a href="/paiments" class="d-block btn btn-success">Paiments</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="bg-white p-5">
        <ul class="mb-5 border rounded py-5">
            <li class="mb-3"><span>Date de paiment : </span> {{$paiment->date_paiment}}</li>
            <li class="mb-3"><span>Montant : </span> {{$paiment->montant}}</li>
            <li class="mb-3"><span>Mode de paiment : </span> {{$paiment->modePaiment->nom}}</li>
            <li class="mb-3"><span>Facture : </span> {{$paiment->facture->numero_facture}}</li>
        </ul>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


