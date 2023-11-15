<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Bootstrap</title>
    <!-- Ajoutez les liens vers les fichiers CSS et JavaScript de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .box{
            text-align: center;
        }
        .box input{
            font-size: 100px;
            width: 150px;
            height: 150px;
        }
    </style>
</head>

<body>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Options</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="section py-4">
                        <div class="container">
                            <form action="set-mdp" method="get">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <div class="col-lg-4 box">
                                            <h3>Admin</h3>
                                            <input type="checkbox" name="choix" checked value="admin"
                                                onchange="selectionnerOption(this)">
                                        </div>

                                        <div class="col-lg-4 box featured">
                                            <h3>Client</h3>
                                            <input type="checkbox" name="choix" value="client"
                                                onchange="selectionnerOption(this)">
                                        </div>

                                        <div class="col-lg-4 box">
                                            <h3>Vendeur</h3>
                                            <input type="checkbox" name="choix" value="vendeur"
                                                onchange="selectionnerOption(this)">
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                            </div>
                            <button type="submit" style="float: right" class="btn btn-outline-primary w-50">Continuer</button>
                            </form>
                        </div>
                        
                        
                    </section>
                </div>

            </div>
        </div>
        
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script>
        // Utilisez jQuery pour déclencher l'affichage de la boîte modale lors du chargement de la page
        $(document).ready(function () {
            $('#exampleModal').modal('show');
        });

        function selectionnerOption(checkbox) {
            var checkboxes = document.querySelectorAll('input[name="choix"]');

            // Désélectionner les autres cases à cocher
            checkboxes.forEach(function (currentCheckbox) {
                if (currentCheckbox !== checkbox) {
                    currentCheckbox.checked = false;
                }
            });
        }
    </script>

</body>

</html>