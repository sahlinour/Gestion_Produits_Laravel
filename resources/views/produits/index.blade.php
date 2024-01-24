<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">  

      <title>  </title>
</head>
<body><div class="container mt-5">
    <h1 class="text-center mb-4">Tableau Des Produits</h1>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Libellé</th>
                <th>Marque</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Images</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produits as $produit)
            <tr>
                <td>{{ $produit->libelle }}</td>
                <td>{{ $produit->marque }}</td>
                <td>{{ $produit->prix}}</td>
                <td>{{ $produit->stock }}</td>
                <td><img width="200" height="100" src="{{ $produit->image }}" alt="product image" srcset="{{ $produit->image }}"></td>
                <td>
                    <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-info btn-sm">Détails</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('produits.create') }}" class="btn btn-success">Ajouter Produit</a>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>