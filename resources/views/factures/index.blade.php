@extends('adminlte::page')

@section('title', 'Liste des Factures')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Liste des Factures</h4>
        @can('facture-create')
        <a href="/factures/create" class="d-block btn btn-success">nouveau Factures</a>
        @endcan
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_table">
        <div class="">
            <a href="/factures/generate-pdf" class="text-info me-1">PDF</a>

            <table class="table table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th>Numéro de facture</th>
                    <th>Date d'émission</th>
                    <th>Date d'échéance</th>
                    <th>Montant total</th>
                    <th>Copropriété</th>
                    <th>Charge</th>
                    <th>état de facture</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($factures as $facture)
                    <tr class="align-middle">
                        <td>{{$facture->numero_facture}}</td>
                        <td>{{$facture->date_emission}}</td>
                        <td>{{$facture->date_echeance}}</td>
                        <td>{{$facture->montant_total}}</td>
                        <td>{{$facture->copropriete->nom}}</td>
                        <td>{{$facture->charge->designation}}</td>
                        <td>
                            @if($facture->etatFacture->nom == 'Payée')
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modifierEtatFactureModal{{$facture->id}}">{{$facture->etatFacture->nom}}</button>
                            @elseif($facture->etatFacture->nom == 'Partiellement payée')
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modifierEtatFactureModal{{$facture->id}}">{{$facture->etatFacture->nom}}</button>
                            @elseif($facture->etatFacture->nom == 'En attente de paiement')
                                <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modifierEtatFactureModal{{$facture->id}}">{{$facture->etatFacture->nom}}</button>
                            @elseif($facture->etatFacture->nom == 'Annulée')
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modifierEtatFactureModal{{$facture->id}}">{{$facture->etatFacture->nom}}</button>
                            @endif
                        </td>
                        <td>
                            <a href="/factures/{{$facture->id}}/afficher" class="text-info me-1"><i class="far fa-fw fa-eye"></i></a>
                            @can('facture-edit')
                            <a href="/factures/{{$facture->id}}/edit" class="text-warning me-1"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            @endcan
                            @can('facture-delete')
                            <form class="d-inline-block" id="deleteForm{{$facture->id}}" action="/factures/{{$facture->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$facture->id}}">
                                <button class="border-0 text-danger bg-transparent p-0" onclick="confirmDelete(event, {{$facture->id}})"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>
                            @endcan
                        </td>

                        <!-- Modal -->
                        <div class="modal fade" id="modifierEtatFactureModal{{$facture->id}}" tabindex="-1" aria-labelledby="modifierEtatFactureLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modifierEtatFactureLabel">Modifier l'état du facture</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="modifierEtatFactureForm" method="post" action="/factures/modifier_etat_facture">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="py-3">
                                                <input type="hidden" name="facture_id" value="{{$facture->id}}">
                                                <div class="form-group mb-4">
                                                    <label class="" for="etat_facture_id">etat du facture : </label>
                                                    <select name="etat_facture_id" id="etat_facture_id" class="form-control @error('etat_facture_id') is-invalid @enderror">
                                                        <option value="">veuillez sélectionner l'état du facture</option>
                                                        @foreach($etat_factures as $etat_facture)
                                                            <option value="{{$etat_facture->id}}" @selected(old('etat_facture_id') == $etat_facture->id)>{{$etat_facture->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('etat_facture_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center pt-3">
                {{ $factures->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@stop


@section('js')
    <script>
        function confirmDelete(event, factureId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?')) {
                document.getElementById('deleteForm'+factureId).submit();
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#modifierEtatFactureForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission behavior

                var form = $(this);
                var url = form.attr('action');
                var formData = form.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        //location.reload();
                        form.unbind('submit').submit();
                    },
                    error: function(xhr, status, error) {
                        // Handle the form submission error
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            $('.modal-body .invalid-feedback').remove();
                            $('.modal-body .is-invalid').removeClass('is-invalid');

                            $.each(errors, function(field, messages) {
                                var input = $('[name="' + field + '"]');
                                input.addClass('is-invalid');
                                $.each(messages, function(index, message) {
                                    input.after('<div class="invalid-feedback">' + message + '</div>');
                                });
                            });
                        }
                    }
                });
            });
            $(document).ready(function() {
    $('.dataTable').DataTable();
  });
        });
    </script>
@stop
