@extends('adminlte::page')

@section('title', 'Ajouter un utilisateur')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Ajouter un nouvau utilisateur</h4>
        <a href="/utilisateurs" class="d-block btn btn-success">Utilisateurs</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/utilisateurs" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="py-5">
                    <div class="row">
                        <div class="col-6 form-group mb-4">
                            <label class="mb-2" for="nom">Nom : </label>
                            <input name="nom" id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
                            @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6 form-group mb-4">
                            <label class="mb-2" for="prenom">Prénom : </label>
                            <input name="prenom" id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}">
                            @error('prenom')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="phone">Phone : </label>
                        <input name="phone" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="email">Email : </label>
                        <input name="email" id="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-2" for="password">Mot de passe : </label>
                        <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="" for="role_id">Role : </label>
                        <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner le role</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" @selected(old('role_id') == $role->id)>{{$role->name}}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="m-0 clearfix">
                        <input class="btn btn-primary float-right" type="submit" value="Ajouter"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
