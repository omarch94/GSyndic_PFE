@extends('adminlte::page')

@section('title', 'afficher un resolution')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Afficher un resolution</h4>
        <a href="/resolutions" class="d-block btn btn-success">resolutions</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="bg-white p-5">
        <ul class="mb-5 border rounded py-5">
            <li class="mb-3"><span>Réclamation : </span> {{$resolution->reclamation->designation}}</li>
            <li class="mb-3"><span>Date de résolution : </span> {{$resolution->date_resolution}}</li>
            <li class="mb-3"><span>Fournisseur de service : </span> {{$resolution->utilisateur->nom}} {{$resolution->utilisateur->prenom}}</li>
            <li class="mb-3"><span>Description : </span> {{$resolution->description}}</li>
        </ul>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


