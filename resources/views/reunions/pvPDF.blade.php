<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    {{-- <img src={{'../../../../public/vendor/img//Users/omarcherti/Documents/PFEE/Gsyndic/public/vendor/adminlte/dist/img/AdminLTELogo3N.png'}}/> --}}
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>ceci est l'état des réunions </p>
  
    <table class="table table-bordered">
        <tr>
            <th>Sujet</th>
            <th>date</th>
            <th>heure debut </th>
            <th> nom immeuble</th>
            <th>Description</th>
        </tr>
        @foreach($reunions as $reunion)
        <tr>
                     <td>{{$reunion->sujet}}</td>
                        <td>{{$reunion->date}}</td>
                        <td>{{$reunion->heure_debut}}</td>
                        <td>{{$reunion->immeuble->nom}}</td>
                        <td>{{$reunion->description}}</td>
        </tr>
        @endforeach
    </table>
  
</body>
</html>