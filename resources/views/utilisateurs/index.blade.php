@extends('adminlte::page')

@section('title', 'Liste des Utilisateurs')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Liste des Utilisateurs</h4>
        @can('user-create')
        <a href="/utilisateurs/create" class="d-block btn btn-success">nouveau Utilisateur</a>
        @endcan
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_table">
        <div class="">

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="align-middle">
                        <td>{{$user->nom}}</td>
                        <td>{{$user->prenom}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->getRoleNames()->first()}}</td>
                        <td>
                            @if($user->statutUtilisateur->nom == 'Actif')
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modifierStatutUtilisateurModal{{$user->id}}">{{$user->statutUtilisateur->nom}}</button>
                            @elseif($user->statutUtilisateur->nom == 'Inactif')
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modifierStatutUtilisateurModal{{$user->id}}">{{$user->statutUtilisateur->nom}}</button>
                            @elseif($user->statutUtilisateur->nom == 'En attente')
                                <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modifierStatutUtilisateurModal{{$user->id}}">{{$user->statutUtilisateur->nom}}</button>
                            @elseif($user->statutUtilisateur->nom == 'Bloqué')
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modifierStatutUtilisateurModal{{$user->id}}">{{$user->statutUtilisateur->nom}}</button>
                            @elseif($user->statutUtilisateur->nom == 'Supprimé')
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modifierStatutUtilisateurModal{{$user->id}}">{{$user->statutUtilisateur->nom}}</button>
                            @endif
                        </td>
                        <td>
                            <a href="/utilisateurs/{{$user->id}}/afficher" class="text-info me-1"><i class="far fa-fw fa-eye"></i></a>
                            @can('user-edit')
                            <a href="/utilisateurs/{{$user->id}}/edit" class="text-warning me-1"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            @endcan
                            @can('user-delete')
                            <form id="deleteForm{{$user->id}}" class="d-inline-block" action="/utilisateurs/{{$user->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <button class="border-0 text-danger bg-transparent p-0"  onclick="confirmDelete(event, {{$user->id}})"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>
                            @endcan()
                        </td>

                        <!-- Modal -->
                        <div class="modal fade" id="modifierStatutUtilisateurModal{{$user->id}}" tabindex="-1" aria-labelledby="modifierStatutModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modifierStatutModalLabel">Modifier le statut</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="modifierStatutForm" method="post" action="/utilisateurs/modifier_statut">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="py-3">
                                                <input type="hidden" name="user_id" value="{{$user->id}}">
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
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        function confirmDelete(event, userId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?')) {
                document.getElementById('deleteForm'+userId).submit();
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
    </script>
@stop



