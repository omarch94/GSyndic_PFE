@extends('adminlte::page')

@section('title', 'Liste des Reunions')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Liste des Reunions</h4>
        @can('reunion-create')
        <a href="/reunions/createMeeting" class="d-block btn btn-success">Nouvelle Reunion</a>
        @endcan
    </div>
@stop

@section('content')
    @include('components.messages_alert')
      <button style="background: rgb(173, 45, 45) ; border-radius:10px"> <a href="/reunions/generate-pdf/" style="color: white ;font-weight:bolder" >telecharger l'état des réunions</a> </button>

    <div class="section_table">
        <div class="">

            <table class="table table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th>Sujet</th>
                    <th>Date</th>
                    <th>Heure de début</th>
                    <th>Heure de fin</th>
                    <th>l'immeuble</th>
                    <th>Procés verbal</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reunions as $reunion)
                    <tr class="align-middle">
                        <td>{{$reunion->sujet}}</td>
                        <td>{{$reunion->date}}</td>
                        <td>{{$reunion->heure_debut}}</td>
                        <td>{{$reunion->heure_fin}}</td>
                        <td>{{$reunion->immeuble->nom}}</td>
                        <td>
                            @if($reunion->proces_verbal)
                                <a href="/reunions/proces_verbal/{{$reunion->id}}">
                                    <i class="far fa-fw fa-file-pdf"></i>
                                </a>
                            @else
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ajouterProcesVerbalModal{{$reunion->id}}">ajouter un procés verbal</button>
                            @endif

                        </td>
                        <td>
                            <a href="/reunions/{{$reunion->id}}/afficher" class="text-info me-1"><i class="far fa-fw fa-eye"></i></a>
                            @can('reunion-edit')
                            <a href="/reunions/{{$reunion->id}}/edit" class="text-warning me-1"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            @endcan
                            @can('reunion-delete')
                            <form class="d-inline-block" id="deleteForm{{$reunion->id}}" action="/reunions/{{$reunion->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$reunion->id}}">
                                <button class="border-0 text-danger bg-transparent p-0" onclick="confirmDelete(event, {{$reunion->id}})"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>
                            @endcan

                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="ajouterProcesVerbalModal{{$reunion->id}}" tabindex="-1" aria-labelledby="ajouterProcesVerbalModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ajouterProcesVerbalModalLabel">Ajouter un procés verbal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                    <form id="ajouterProcesVerbalForm" enctype="multipart/form-data" method="post" action="/reunions/ajouter_proces_verbal">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="py-3">
                                                <input type="hidden" name="reunion_id" value="{{$reunion->id}}">
                                                <div class="form-group mb-4">
                                                    <label for="proces_verbal">Procés verbal:</label>
                                                    <input type="file" name="proces_verbal" class="form-control @error('proces_verbal') is-invalid @enderror" id="proces_verbal">
                                                    @error('proces_verbal')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Ajouter</button>
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
                {{ $reunions->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@stop


@section('js')
    <script>
        function confirmDelete(event, reunionId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?')) {
                document.getElementById('deleteForm'+reunionId).submit();
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#ajouterProcesVerbalForm').on('submit', function(event) {
                event.preventDefault();

                var form = $(this);
                var url = form.attr('action');
                var formData = new FormData(form[0]); // Use FormData to handle file uploads

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        form.unbind('submit').submit();
                    },
                    error: function(xhr, status, error) {
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
