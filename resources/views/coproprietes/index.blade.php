@extends('adminlte::page')

@section('title', 'Liste des Copropriétés')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Liste des Copropriétés</h4>
        @can('copropriete-create')
            <a href="/coproprietes/create" class="d-block btn btn-success">nouveau Copropriété</a>
        @endcan
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section-search border-top border-bottom mb-3 py-2">
        <div class="row">
            <div class="col-3 form-group">
                <label for="nom">chércher par Nom</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-3 form-group">
                <label for="nom">chércher par ville</label>
                <select name="ville_id" id="" class="form-control">
                    <option value="">Sélectionner une ville</option>
                    @foreach($villes as $ville)
                        <option value="{{$ville->id}}">{{$ville->nom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3 form-group">
                <label for="nom">Copropriétaire</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-3 form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control">
            </div>
        </div>
    </div>

    <div class="section_table">
        <div class="">

            <table class="table table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th>nom</th>
                    <th>adresse</th>
                    <th>code postal</th>
                    <th>ville</th>
                    <th>Nombre de lots</th>
                    <th>Date de création</th>
                    <th>Copropriétaire</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($coproprietes as $copropriete)
                    <tr class="align-middle">
                        <td>{{$copropriete->nom}}</td>
                        <td>{{$copropriete->adresse}}</td>
                        <td>{{$copropriete->code_postal}}</td>
                        <td>{{$copropriete->ville->nom}}</td>
                        <td>{{$copropriete->nb_lots}}</td>
                        <td>{{$copropriete->date_creation}}</td>
                        <td>{{$copropriete->coproprietaire->nom}} {{$copropriete->coproprietaire->prenom}}</td>
                        <td>
                            <a href="/coproprietes/{{$copropriete->id}}/afficher" class="text-info me-1"><i class="far fa-fw fa-eye"></i></a>
                            @can('copropriete-edit')
                            <a href="/coproprietes/{{$copropriete->id}}/edit" class="text-warning me-1"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            @endcan
                            @can('copropriete-delete')
                            <form class="d-inline-block" id="deleteForm{{$copropriete->id}}" action="/coproprietes/{{$copropriete->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$copropriete->id}}">
                                <button class="border-0 text-danger bg-transparent p-0" onclick="confirmDelete(event, {{$copropriete->id}})"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>
                            @endcan

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center pt-3">
                {{ $coproprietes->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@stop


@section('js')
    <script>
        function confirmDelete(event, coproprieteId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?')) {
                document.getElementById('deleteForm'+coproprieteId).submit();
            }
     
        }
        $(document).ready(function() {
    $('.dataTable').DataTable();
  });
    </script>
@stop
