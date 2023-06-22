<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>ceci est l'état des factures </p>
  
    <table class="table table-bordered">
        <tr>
            <th>numero de la facture</th>
            <th>date d'emission</th>
            <th> date d'echeance</th>
            <th>Montant de la facture</th>
            <th>nom compropriétaire</th>
            <th>Description</th>
        </tr>
        @foreach($factures as $facture)
        <tr>
                     <td>{{$facture->numero_facture}}</td>
                        <td>{{$facture->date_emission}}</td>
                        <td>{{$facture->date_echeance}}</td>
                        <td>{{$facture->montant_total}}</td>
                        <td>{{$facture->copropriete->nom}}</td>
                        {{-- <td>{{$facture->etat_facture->nom}}</td> --}}
                        <td>{{$facture->charge->designation}}</td>
        </tr>
        @endforeach
    </table>
  
</body>
</html>