@extends('adminlte::page')

@section('title', 'Mon Profile')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">MonProfile</h4>
    </div>
@stop

@section('content')
    @include('components.messages_alert')
    <div class="bg-white p-5">
        <ul class="mb-5">
            <li><span>Nom : </span> {{$user->nom}}</li>
            <li><span>Prénom : </span> {{$user->prenom}}</li>
            <li><span>phone : </span> {{$user->phone}}</li>
            <li><span>Email : </span> {{$user->email}}</li>
            <li><span>Roles : </span> {{$user->getRoleNames()->first()}}</li>
            <li><span>Statut : </span> {{$user->statutUtilisateur->nom}}</li>
        </ul>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


