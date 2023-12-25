<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ajoutez ce style pour le changement de couleur au survol */
        tbody tr:hover {
            background-color: #f5f5f5;
        }
    </style>
    <title>Tableau Bootstrap avec Changement de Couleur au Survol</title>
</head>
<body>

<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#NUM DOSSIER</th>
                <th scope="col">DATE PROD</th>
                <th scope="col">AUTHEUR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>d1</td>
                <td>d2</td>
                <td>d3</td>
            </tr>
            <tr>
                <td>d1</td>
                <td>d2</td>
                <td>d3</td>
            </tr>
            <!-- Ajoutez davantage de lignes selon vos besoins -->
        </tbody>
    </table>
</div>

<!-- jQuery, Popper.js, and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
