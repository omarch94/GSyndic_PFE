@extends('adminlte::page')

@section('title', 'Liste des Reclamations')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Liste des Reclamations</h4>
        @can('reclamation-create')
        <a href="/reclamations/create" class="d-block btn btn-success">Nouvelle Réclamations</a>
        @endcan
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_table">
        <div class="">

            <table class="table table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th>Désignation</th>
                    <th>Date de réclamation</th>
                    <th>Type de réclamation</th>
                    <th>Copropriété</th>
                    <th>Canal</th>
                    <th>Réclamateur</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reclamations as $reclamation)
                    <tr class="align-middle">
                        <td>{{$reclamation->designation}}</td>
                        <td>{{$reclamation->date_reclamation}}</td>
                        <td>{{$reclamation->typeReclamation->nom}}</td>
                        <td>{{$reclamation->copropriete->nom}}</td>
                        <td>{{$reclamation->canal->nom}}</td>
                        <td>{{$reclamation->utilisateur->nom}} {{$reclamation->utilisateur->prenom}}</td>
                        <td>
                            @if($reclamation->statutReclamation->nom == 'En attente')
                                <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modifierStatutReclamationModal{{$reclamation->id}}">{{$reclamation->statutReclamation->nom}}</button>
                            @elseif($reclamation->statutReclamation->nom == 'En cours de traitement')
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modifierStatutReclamationModal{{$reclamation->id}}">{{$reclamation->statutReclamation->nom}}</button>
                            @elseif($reclamation->statutReclamation->nom == 'Résolue')
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modifierStatutReclamationModal{{$reclamation->id}}">{{$reclamation->statutReclamation->nom}}</button>
                            @elseif($reclamation->statutReclamation->nom == 'En attente d\'action')
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modifierStatutReclamationModal{{$reclamation->id}}">{{$reclamation->statutReclamation->nom}}</button>
                            @elseif($reclamation->statutReclamation->nom == 'Fermée')
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modifierStatutReclamationModal{{$reclamation->id}}">{{$reclamation->statutReclamation->nom}}</button>
                            @endif
                            {{--$reclamation->statutReclamation->nom--}}
                        </td>
                        <td>
                            <a href="/reclamations/{{$reclamation->id}}/afficher" class="text-info me-1"><i class="far fa-fw fa-eye"></i></a>
                            @can('reclamation-edit')
                            <a href="/reclamations/{{$reclamation->id}}/edit" class="text-warning me-1"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            @endcan
                            @can('reclamation-delete')
                            <form class="d-inline-block" id="deleteForm{{$reclamation->id}}" action="/reclamations/{{$reclamation->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$reclamation->id}}">
                                <button class="border-0 text-danger bg-transparent p-0" onclick="confirmDelete(event, {{$reclamation->id}})"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>
                            @endcan
                        </td>

                        <!-- Modal -->
                        <div class="modal fade" id="modifierStatutReclamationModal{{$reclamation->id}}" tabindex="-1" aria-labelledby="modifierStatutModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modifierStatutModalLabel">Modifier le statut</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="modifierStatutForm" method="post" action="/reclamations/modifier_statut">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="py-3">
                                                <input type="hidden" name="reclamation_id" value="{{$reclamation->id}}">
                                                <div class="form-group mb-4">
                                                    <label class="" for="statut_id">Statut : </label>
                                                    <select name="statut_id" id="statut_id" class="form-control @error('statut_id') is-invalid @enderror">
                                                        <option value="">veuillez sélectionner le statut</option>
                                                        @foreach($statuts as $statut)
                                                            <option value="{{$statut->id}}" @selected(old('statut_id') == $statut->id)>{{$statut->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('statut_id')
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
                {{ $reclamations->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@stop


@section('js')
    <script>
        function confirmDelete(event, reclamationId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?')) {
                document.getElementById('deleteForm'+reclamationId).submit();
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#modifierStatutForm').on('submit', function(event) {
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
        });
        $(document).ready(function() {
    $('.dataTable').DataTable();
  });
    </script>
@stop
