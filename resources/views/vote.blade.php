@extends('adminlte::page')

@section('title', 'vote')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">vote</h4>
    </div>
@stop

@section('content')
    @include('components.messages_alert')
    <li class="nav-item">
        {{-- <a class="nav-link" href="{{ route('vote') }}">Logout</a> --}}
    </li>
@stop
