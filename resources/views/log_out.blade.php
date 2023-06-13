@extends('adminlte::page')

@section('title', 'logout')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">deconnexion</h4>
    </div>
@stop

@section('content')
    @include('components.messages_alert')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
    </li>
@stop
