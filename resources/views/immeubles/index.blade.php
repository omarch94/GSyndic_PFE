@extends('adminlte::page')

@section('title', 'Liste des Immeubles')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Liste des Immeubles</h4>
        @can('immeuble-create')
        <a href="/immeubles/create" class="d-block btn btn-success">nouveau Immeuble</a>
        @endcan
    </div>
@stop

@section('content')
{{-- @section('plugins.Datatables', true) --}}

    @include('components.messages_alert')

    <div class="section_table">
        <div class="">
       
                    List des immeubles
                    <a class="btn btn-warning float-end" href="{{ route('immeubles.export') }}">Export Immeubles</a>
               
            <table class="table table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th>nom</th>
                    <th>adresse</th>
                    <th>code postal</th>
                    <th>ville</th>
                    <th>Nombre d'étage</th>
                    <th>Nombre de logement</th>
                    <th>année de construction</th>
                    <th>Action</th>
                </tr>
              
                </thead>
                <tbody>
                @foreach($immeubles as $immeuble)
                    <tr class="align-middle">
                        <td>{{$immeuble->nom}}</td>
                        <td>{{$immeuble->adresse}}</td>
                        <td>{{$immeuble->code_postal}}</td>
                        <td>{{$immeuble->ville->nom}}</td>
                        <td>{{$immeuble->nb_etages}}</td>
                        <td>{{$immeuble->nb_logements}}</td>
                        <td>{{$immeuble->annee_construction}}</td>
                        <td>
                            <a href="/immeubles/{{$immeuble->id}}/afficher" class="text-info me-1"><i class="far fa-fw fa-eye"></i></a>
                            @can('immeuble-edit')
                            <a href="/immeubles/{{$immeuble->id}}/edit" class="text-warning me-1"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            @endcan
                            @can('immeuble-delete')
                            <form class="d-inline-block" id="deleteForm{{$immeuble->id}}" action="/immeubles/{{$immeuble->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$immeuble->id}}">
                                <button class="border-0 text-danger bg-transparent p-0" onclick="confirmDelete(event, {{$immeuble->id}})"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>
                            @endcan

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center pt-3">
                {{ $immeubles->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@stop


@section('js')
    <script>
        function confirmDelete(event, immeubleId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?')) {
                document.getElementById('deleteForm'+immeubleId).submit();
            }
        }
        $(document).ready(function() {
    $('.dataTable').DataTable();
  });
    </script>
@stop
