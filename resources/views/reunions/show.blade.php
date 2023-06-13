@extends('adminlte::page')

@section('title', 'afficher un Reunion')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Afficher un Reunion</h4>
        <a href="/reunions" class="d-block btn btn-success">Reunions</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="bg-white p-5">
        <ul class="mb-5 border rounded py-5">
            <li class="mb-3"><span>Sujet : </span> {{$reunion->sujet}}</li>
            <li class="mb-3"><span>Date : </span> {{$reunion->date}}</li>
            <li class="mb-3"><span>Heure de début : </span> {{$reunion->heure_debut}}</li>
            <li class="mb-3"><span>Heure de fin : </span> {{$reunion->heure_fin}}</li>
            <li class="mb-3"><span>L'immeuble : </span> {{$reunion->immeuble->nom}}</li>
            <li class="mb-3"><span>L'adresse : </span> {{$reunion->immeuble->adresse}}</li>
            @if($reunion->proces_verbal)<li class="mb-3"><span>Procés verbal : </span> <a class="btn btn-success btn-sm" href="/reunions/proces_verbal/{{$reunion->id}}"><i class="far fa-fw fa-file-pdf mr-2"></i>Télécharger le procés verbal</a></li>@endif
            <li class="mb-3"><span>Description : </span> {{$reunion->description}}</li>
        </ul>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


