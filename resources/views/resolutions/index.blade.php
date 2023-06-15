@extends('adminlte::page')

@section('title', 'Liste des resolutions')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Liste des resolutions</h4>
        @can('resolution-create')
        <a href="/resolutions/create" class="d-block btn btn-success">nouveau resolutions</a>
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
                    <th>Réclamation</th>
                    <th>Date de résoution</th>
                    <th>Fournisseur</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($resolutions as $resolution)
                    <tr class="align-middle">
                        <td>{{$resolution->reclamation->designation}}</td>
                        <td>{{$resolution->date_resolution}}</td>
                        <td>{{$resolution->utilisateur->nom}} {{$resolution->utilisateur->prenom}}</td>
                        <td>{{$resolution->description}}</td>
                        <td>
                            <a href="/resolutions/{{$resolution->id}}/afficher" class="text-info me-1"><i class="far fa-fw fa-eye"></i></a>
                            @can('reclamation-edit')
                            <a href="/resolutions/{{$resolution->id}}/edit" class="text-warning me-1"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            @endcan
                            @can('reclamation-delete')
                            <form class="d-inline-block" id="deleteForm{{$resolution->id}}" action="/resolutions/{{$resolution->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$resolution->id}}">
                                <button class="border-0 text-danger bg-transparent p-0" onclick="confirmDelete(event, {{$resolution->id}})"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>
                            @endcan

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center pt-3">
                {{ $resolutions->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@stop


@section('js')
    <script>
        function confirmDelete(event, resolutionId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?')) {
                document.getElementById('deleteForm'+resolutionId).submit();
            }
        }
        $(document).ready(function() {
    $('.dataTable').DataTable();
  });
    </script>
@stop
