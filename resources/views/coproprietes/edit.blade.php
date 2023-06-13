@extends('adminlte::page')

@section('title', 'Modifier une copropriété')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Modifier une copropriété</h4>
        <a href="/coproprietes" class="d-block btn btn-success">Copropriétés</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/coproprietes/{{$copropriete->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="">
                    <div class="form-group mb-4">
                        <label class="mb-2" for="nom">Nom : </label>
                        <input name="nom" id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $copropriete->nom) }}">
                        @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-2" for="adresse">Adresse : </label>
                        <input name="adresse" id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" value="{{ old('adresse', $copropriete->adresse) }}">
                        @error('adresse')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="form-group col-6">
                            <label class="mb-2" for="phone">Code Postal : </label>
                            <input name="code_postal" id="code_postal" type="text" class="form-control @error('code_postal') is-invalid @enderror" value="{{ old('code_postal', $copropriete->code_postal) }}">
                            @error('code_postal')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label class="" for="ville_id">Ville : </label>
                            <select name="ville_id" id="ville_id" class="form-control @error('ville_id') is-invalid @enderror">
                                <option>veuillez sélectionner le ville</option>
                                @foreach($villes as $ville)
                                    <option value="{{$ville->id}}" @selected(old('ville_id', $copropriete->ville_id) == $ville->id)>{{$ville->nom}}</option>
                                @endforeach
                            </select>
                            @error('ville_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="form-group col-6">
                            <label class="mb-2" for="nb_etages">Interface : </label>
                            <input name="interface" id="interface" type="text" class="form-control @error('interface') is-invalid @enderror" value="{{ old('interface', $copropriete->interface) }}">
                            @error('interface')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label class="mb-2" for="nb_logement">Nombre de Lot : </label>
                            <input name="nb_lots" id="nb_lots" type="number" class="form-control @error('nb_lots') is-invalid @enderror" value="{{ old('nb_lots', $copropriete->nb_lots) }}">
                            @error('nb_lots')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-4">
                        <div class="form-group col-6">
                            <label class="mb-2" for="date_creation">Date de Création : </label>
                            <input name="date_creation" id="date_creation" type="date" class="form-control @error('date_creation') is-invalid @enderror" value="{{ old('date_creation', $copropriete->date_creation) }}">
                            @error('date_creation')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label class="mb-2" for="date_modification">Date de Modification : </label>
                            <input name="date_modification" id="date_modification" type="date" class="form-control @error('date_modification') is-invalid @enderror" value="{{ old('date_modification', $copropriete->date_modification) }}">
                            @error('date_modification')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="" for="immeuble_id">L'immeuble : </label>
                        <select name="immeuble_id" id="immeuble_id" class="form-control @error('immeuble_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner l'immeuble</option>
                        </select>
                        @error('immeuble_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="" for="coproprietaire_id">Copropriétaire : </label>
                        <select name="coproprietaire_id" id="coproprietaire_id" class="form-control @error('coproprietaire_id') is-invalid @enderror">
                            <option value="">veuillez sélectionner le copropriétaire</option>
                            @foreach($coproprietaires as $coproprietaire)
                                <option value="{{$coproprietaire->id}}" @selected(old('coproprietaire_id',  $copropriete->coproprietaire_id) == $coproprietaire->id)>{{$coproprietaire->nom}} {{$coproprietaire->prenom}}</option>
                            @endforeach
                        </select>
                        @error('coproprietaire_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="description">Description : </label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" style="height: 150px; resize:none;">{{ old('description', $copropriete->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="m-0 clearfix">
                        <input class="btn btn-primary float-right" type="submit" value="Modifier"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop

@section('js')
    <script>
        $(document).ready(function() {
            var selectedVilleId = '{{ old('ville_id', $copropriete->ville_id) }}';
            var selectedImmeubleId = '{{ old('immeuble_id',$copropriete->immeuble_id) }}';

            $.ajax({
                url: '/immeubles/get-immeubles',
                type: 'GET',
                data: { ville_id: selectedVilleId },
                success: function(response) {
                    $('#immeuble_id').empty();

                    $('#immeuble_id').append($('<option value="">veuillez sélectionner l\'immeuble</option>'));
                    $.each(response.immeubles, function(key, immeuble) {
                        var option = $('<option></option>').val(immeuble.id).text(immeuble.nom);
                        if (immeuble.id == selectedImmeubleId) {
                            option.attr('selected', 'selected');
                        }
                        $('#immeuble_id').append(option);
                    });
                },
                error: function(xhr) {
                }
            });

        });

        $(document).ready(function() {

            $('#ville_id').change(function() {
                var villeId = $(this).val();


                $.ajax({
                    url: '/immeubles/get-immeubles',
                    type: 'GET',
                    data: { ville_id: villeId },
                    success: function(response) {
                        $('#immeuble_id').empty();

                        $('#immeuble_id').append($('<option value="">veuillez sélectionner l\'immeuble</option>'));
                        $.each(response.immeubles, function(key, immeuble) {
                            $('#immeuble_id').append($('<option></option>').val(immeuble.id).text(immeuble.nom));
                        });
                    },
                    error: function(xhr) {
                    }
                });
            });
        });
    </script>
@stop

