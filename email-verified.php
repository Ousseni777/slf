<?php
session_start();
include_once "./connectToDB.php";
if (isset($_GET['ticket'])) {

    $SELLER_ID = $_GET['ticket'];

    $select_query = "SELECT * FROM `slf_user_salafin` WHERE SELLER_ID= '$SELLER_ID' ";
    $result_select = $conn->query($select_query);


    if (($result_select->num_rows > 0)) {
        $seller = $result_select->fetch_assoc();

        $update_user = "UPDATE `slf_user_salafin` SET `ACTIVATE_STATE`= 1 WHERE SELLER_ID = '$SELLER_ID'";
        $result_update_user = $conn->query($update_user);

        if (($result_update_user)) {

            $_SESSION['SELLER_ID'] = $seller['SELLER_ID'];
            $_SESSION['ENTITE'] = $seller['ENTITE'];

            $verification_status = true;
            $msg = "success";
        } else {
            $verification_status = false;
        }

    } else {
        $verification_status = false;
    }
} else {
    $verification_status = false;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>charte</title>
    <!-- Ajoutez les liens vers les fichiers CSS et JavaScript de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <main class="main" id="main">
        <div class="modal fade min-vh-100 d-flex flex-column align-items-center justify-content-center py-4"
            id="alert-modal" role="dialog" tabindex="-1" aria-labelledby="alert-modalLabel" data-bs-backdrop="static"
            aria-hidden="true" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <?php


                        if ($verification_status) {
                            // echo $diff_secondes;
                            echo '<h2 style="text-align: center;" >Compte activé</h2>';
                            echo '<div class="alert alert-success mt-5" role="alert">
                                            Félicitations ! Votre compte d\'être activé <br>
                                            Vous pouvez acceder à votre espace travail.
                                          </div>';
                            echo '
                            <div class="modal-footer">
                                    <a href="./#about"  class="btn btn-secondary">Fermer</a>
                                    <a href="./espace" class="btn btn-primary">Acceder à l\'espace</a>
                                </div>';
                        } else {
                            echo '<h2 style="text-align: center;" >Compte non activé</h2>';
                            echo '<div class="alert alert-danger mt-5" role="alert">
                                            Désolé, le lien de vérification est invalide ou a expiré. Veuillez recommencer ulterièrement.
                                          </div>';
                            echo '
                                <div class="modal-footer">
                                        <a href="./#about"  class="btn btn-secondary">Fermer</a>                                                  
                                    </div>';
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script>
        // Utilisez jQuery pour déclencher l'affichage de la boîte modale lors du chargement de la page
        $(document).ready(function () {
            $('#alert-modal').modal('show');
        });
    </script>

</body>

</html>