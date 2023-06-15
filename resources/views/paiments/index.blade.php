@extends('adminlte::page')

@section('title', 'Liste des Paiments')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Liste des Paiments</h4>
        @can('paiment-create')
        <a href="/paiments/create" class="d-block btn btn-success">nouveau Paiments</a>
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
                    <th>Date de paiment</th>
                    <th>Montant</th>
                    <th>Mode de paiment</th>
                    <th>Facture</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paiments as $paiment)
                    <tr class="align-middle">
                        <td>{{$paiment->date_paiment}}</td>
                        <td>{{$paiment->montant}}</td>
                        <td>{{$paiment->modePaiment->nom}}</td>
                        <td>{{$paiment->facture->numero_facture}}</td>
                        <td>
                            <a href="/paiments/{{$paiment->id}}/afficher" class="text-info me-1"><i class="far fa-fw fa-eye"></i></a>
                            @can('paiment-edit')
                            <a href="/paiments/{{$paiment->id}}/edit" class="text-warning me-1"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            @endcan
                            @can('paiment-delete')
                            <form class="d-inline-block" id="deleteForm{{$paiment->id}}" action="/paiments/{{$paiment->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$paiment->id}}">
                                <button class="border-0 text-danger bg-transparent p-0" onclick="confirmDelete(event, {{$paiment->id}})"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center pt-3">
                {{ $paiments->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@stop


@section('js')
    <script>
        function confirmDelete(event, paimentId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?')) {
                document.getElementById('deleteForm'+paimentId).submit();
            }
        }
        $(document).ready(function() {
    $('.dataTable').DataTable();
  });
    </script>
@stop
