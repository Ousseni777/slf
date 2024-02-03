<?php
session_start();
include_once "./connectToDB.php";
if (isset($_GET['ticket'])) {

    $CREDIT_ID_TEMP = $_GET['ticket'];

    $select_query_temp = "SELECT * FROM `temp_verification` WHERE CREDIT_ID_TEMP= '$CREDIT_ID_TEMP' ";
    $result_select_temp = $conn->query($select_query_temp);

    $select_query = "SELECT * FROM `credit_client` WHERE CREDIT_ID= '$CREDIT_ID_TEMP'";
    $result_select = $conn->query($select_query);

    if (($result_select->num_rows > 0) && ($result_select_temp->num_rows > 0)) {
        $credit = $result_select_temp->fetch_assoc();

        $heure_value = $credit['UP_DATE_TIME_TEMP'];

        // Convertir la valeur en objet DateTime
        $heure_colonne = DateTime::createFromFormat('H:i:s', $heure_value);

        $now = new DateTime();

        // Afficher la différence
        $timestamp_heure_colonne = $heure_colonne->getTimestamp();
        $timestamp_now = $now->getTimestamp();

        // Calculer la différence en secondes
        $diff_secondes = $timestamp_now - $timestamp_heure_colonne;
        if ($diff_secondes < 300) { //Le lien n'est pas expiré  (temps < 5 secondes)          
            
            //Mettre à jour le credit de l'intitulé avec son propre ID : $CLIENT_ID
            $CLIENT_ID = $credit['CLIENT_ID_TEMP'];
            $update_query = "UPDATE `credit_client` SET `CLIENT_ID`= '$CLIENT_ID' WHERE `CLIENT_ID` = '$CREDIT_ID_TEMP' ";
            $result_update = $conn->query($update_query);
            if (($result_update)) {                

                $_SESSION['CLIENT_ID_TEMP'] = $CLIENT_ID;
                $verification_status = true;
                $msg = "success";
            } else {
                $verification_status = false;
            }
        } else { //Le lien est expiré
            
            //Annuler le credit demandé
            $delete_query = "DELETE FROM `credit_client` WHERE CREDIT_ID= '$CREDIT_ID_TEMP' ";
            $conn->query($delete_query);

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
            id="exampleModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
            aria-hidden="true" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <?php


                        if ($verification_status) {
                            // echo $diff_secondes;
                            echo '<h2 style="text-align: center;" >Compte activé</h2>';
                            echo '<div class="alert alert-success mt-5" role="alert">
                                            Félicitations ! Votre adresse e-mail a été vérifiée avec succès. <br>
                                            Vous pouvez acceder à votre espace pour compléter et suivre l\'état d\'avancement de votre demande.
                                          </div>';
                            echo '
                            <div class="modal-footer">
                                    <a href="./#about"  class="btn btn-secondary">Fermer</a>
                                    <a href="./sim-cl?tag=chrono" class="btn btn-primary">Suivre ma demande</a>
                                </div>';
                        } else {
                            echo '<h2 style="text-align: center;" >Compte non activé</h2>';
                            echo '<div class="alert alert-danger mt-5" role="alert">
                                            Désolé, le lien de vérification est invalide ou a expiré. Veuillez recommencer à nouveau la <a href="./">simulation</a> pour recevoir un nouveau lien.
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
            $('#exampleModal').modal('show');
        });
    </script>

</body>

</html>