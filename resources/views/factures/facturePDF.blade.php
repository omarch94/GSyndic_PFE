<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>ceci est l'état des factures </p>
  
    <table class="table table-bordered">
        <tr>
            <th>numero de la facture</th>
            <th>Montant de la facture</th>
            <th>Description</th>
        </tr>
        @foreach($factures as $facture)
        <tr>
            <td>{{ $facture->numero_facture }}</td>
            <td>{{ $facture->montant_total }}</td>
            <td>{{ $facture->description }}</td>
        </tr>
        @endforeach
    </table>
  
</body>
</html>