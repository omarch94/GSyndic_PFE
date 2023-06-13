@extends('adminlte::page')

@section('title', 'Modifier un facture')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Modifier un facture</h4>
        <a href="/factures" class="d-block btn btn-success">Factures</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_form">
        <div class="p-5 bg-white">
            <form action="/factures/{{$facture->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="">

                    <div class="form-group mb-4">
                        <label class="mb-2" for="numero_facture">Numéro de facture : </label>
                        <input name="numero_facture" id="numero_facture" type="text" class="form-control @error('numero_facture') is-invalid @enderror" value="{{ old('numero_facture', $facture->numero_facture) }}">
                        @error('numero_facture')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="form-group col-6">
                            <label class="mb-2" for="date_emission">Date d'émmission : </label>
                            <input name="date_emission" id="date_emission" type="date" class="form-control @error('date_emission') is-invalid @enderror" value="{{ old('date_emission', $facture->date_emission) }}">
                            @error('date_emission')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label class="mb-2" for="date_echeance">Date d'échéance : </label>
                            <input name="date_echeance" id="date_echeance" type="date" class="form-control @error('date_echeance') is-invalid @enderror" value="{{ old('date_echeance', $facture->date_echeance) }}">
                            @error('date_echeance')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="montant_total">Montant Total : </label>
                        <input name="montant_total" id="montant_total" type="text" class="form-control @error('montant_total') is-invalid @enderror" value="{{ old('montant_total', $facture->montant_total) }}">
                        @error('montant_total')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="form-group col-6">
                            <label class="" for="copropriete_id">Copropriété : </label>
                            <select name="copropriete_id" id="copropriete_id" class="form-control @error('copropriete_id') is-invalid @enderror">
                                <option value="">veuillez sélectionner le copropriété</option>
                                @foreach($coproprietes as $copropriete)
                                    <option value="{{$copropriete->id}}" @selected(old('copropriete_id', $facture->copropriete_id) == $copropriete->id)>{{$copropriete->nom}}</option>
                                @endforeach
                            </select>
                            @error('copropriete_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label class="" for="charge_id">Charge : </label>
                            <select name="charge_id" id="charge_id" class="form-control @error('charge_id') is-invalid @enderror">
                                <option value="">veuillez séléctionner la Charge</option>
                            </select>
                            @error('charge_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group mb-4">
                        <label class="" for="etat_facture_id">état du facture : </label>
                        <select name="etat_facture_id" id="etat_facture_id" class="form-control @error('etat_facture_id') is-invalid @enderror">
                            <option value="">veuillez séléctionner l'état du facture</option>
                            @foreach($etat_factures as $etat_facture)
                                <option value="{{$etat_facture->id}}" @selected(old('etat_facture_id', $facture->etat_facture_id) == $etat_facture->id)>{{$etat_facture->nom}}</option>
                            @endforeach
                        </select>
                        @error('etat_facture_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="description">Déscription : </label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" style="height: 150px; resize:none;">{{ old('description', $facture->description) }}</textarea>
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
            var selectedCoproprieteId = '{{ old('copropriete_id', $facture->copropriete_id) }}';
            var selectedChargeId = '{{ old('charge_id', $facture->charge_id) }}';

            $.ajax({
                url: '/coproprietes/get-charges',
                type: 'GET',
                data: { copropriete_id: selectedCoproprieteId },
                success: function(response) {
                    $('#charge_id').empty();

                    $('#charge_id').append($('<option value="">veuillez sélectionner la Charge</option>'));
                    $.each(response.charges, function(key, charge) {
                        var option = $('<option></option>').val(charge.id).text(charge.designation);
                        if (charge.id == selectedChargeId) {
                            option.attr('selected', 'selected');
                        }
                        $('#charge_id').append(option);
                    });
                },
                error: function(xhr) {
                }
            });

        });

        $(document).ready(function() {
            $('#copropriete_id').change(function() {
                var copropriete_id = $(this).val();

                $.ajax({
                    url: '/coproprietes/get-charges',
                    type: 'GET',
                    data: { copropriete_id: copropriete_id },
                    success: function(response) {
                        $('#charge_id').empty();

                        $('#charge_id').append($('<option value="">veuillez séléctionner la Charge</option>'));
                        $.each(response.charges, function(key, charge) {
                            $('#charge_id').append($('<option></option>').val(charge.id).text(charge.designation));
                        });
                    },
                    error: function(xhr) {
                    }
                });
            });
        });
    </script>
@stop

