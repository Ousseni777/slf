<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Bootstrap</title>
    <!-- Ajoutez les liens vers les fichiers CSS et JavaScript de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ma Boîte Modale</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-5">
                        <h2>Conditions d'Utilisation</h2>
                        <p>
                            Bienvenue sur notre site Web. Avant de procéder à l'inscription, veuillez lire attentivement
                            les conditions d'utilisation suivantes :
                        </p>

                        <ul>
                            <li>Vous devez avoir au moins 18 ans pour utiliser nos services.</li>
                            <li>L'utilisation de nos services est soumise à l'acceptation de nos conditions
                                d'utilisation.</li>
                            <li>Nous nous réservons le droit de modifier les conditions d'utilisation à tout moment sans
                                préavis.</li>
                            <!-- Ajoutez d'autres points selon vos besoins -->
                        </ul>
                        <form action="set-mdp" method="get">
                            <div class="form-check">
                                <input style="display : block;" name="email" class="form-check-input" type="text"
                                    value="<?php echo $_GET['email'] ?>">
                                <input class="form-check-input" type="checkbox" id="accepter" required>
                                <label class="form-check-label" for="accepter">
                                    Je confirme avoir lu et accepté les conditions d'utilisation.
                                </label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Acepter et continuer</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    

    <script>
        // Utilisez jQuery pour déclencher l'affichage de la boîte modale lors du chargement de la page
        $(document).ready(function () {
            $('#exampleModal').modal('show');
        });
    </script>

</body>

</html>