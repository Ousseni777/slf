<?php
session_start();
$state = 0;
include_once "./connectToDB.php";

$fname = mysqli_real_escape_string($conn, $_POST['yourFullName']);
$vendeur = mysqli_real_escape_string($conn, $_POST['brand']);
$region = mysqli_real_escape_string($conn, $_POST['yourRegion']);
$province = mysqli_real_escape_string($conn, $_POST['yourProvince']);
$town = mysqli_real_escape_string($conn, $_POST['yourTown']);
$profession = mysqli_real_escape_string($conn, $_POST['yourProfession']);
$email = mysqli_real_escape_string($conn, $_POST['yourEmail']);
$phone = mysqli_real_escape_string($conn, $_POST['yourPhone']);
// $password = mysqli_real_escape_string($conn, $_POST['password1']);
// $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

if (isset($email) and isset($fname)  and isset($phone)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {        

        $query = "SELECT *  FROM SLF_USER  WHERE email = '{$email}'";
        $result = $conn->query($query);
    
        if ($result->num_rows > 0) {                      
            $msg = "$email - This email already exist!";
            $state = 1;
        } else {
            $rand_text1=generateUniqueID(3);
            $rand_text2=generateUniqueID(1);
            $ran_id = rand(time(), 100000000);
            $ran_id = $rand_text1 . '-'. $ran_id . $rand_text2;
            $password='v';
            $encrypt_pass = md5($password);
            $insert_query = "INSERT INTO `slf_user` (`id_unique`, `id_brand`, `full_name`, `region`, `town`, `profession`, `email`, `tel`, `password`) 
            VALUES ('{$ran_id}','{$vendeur}','{$fname}', '{$region}', '{$town}', '{$profession}', '{$email}', '{$phone}','{$encrypt_pass}')";
           
            $result_insert = $conn->query($insert_query);
            if (($result_insert)) {                
                $msg = "Insertion OK !";
                header("location: ./modal");
            } else {
                $msg = "Something went wrong. Please try again!";

                $state = 1;
            }
        }
    } else {
        $msg = "Email incorrect!";

        $state = 1;
    }
} else {
    $msg = "All input fields are required!";
    $state = 1;
}

echo $msg;


function generateUniqueID($k){    
    $alpha="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $concat='';
    for ($i = 0; $i < $k; $i++) {
        $concat= $concat . $alpha[ rand( 0, strlen($alpha) - 1 ) ]; 
    }
    return $concat;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parcours de Boîtes Modales avec Bootstrap</title>
  <!-- Inclure les fichiers Bootstrap CSS et JavaScript -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
    .valide {
        text-align: center;
        width: 100%;
    }

    .valide i {

        color: greenyellow;
        font-size: 100px;
    }

    .alert-success {
        text-align: center;
        padding: 5%;
    }
</style>
</head>
<body>


	<!-- Bouton masqué pour déclencher la boîte modale -->
	<button id="hiddenButton" style="display: none;" type="button" class="btn btn-primary" data-bs-toggle="modal"
		data-bs-target="#exampleModal">
		Afficher la Boîte Modale
	</button>

	<!-- Boîte Modale -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
		data-bs-backdrop="static" data-bs-keyboard="false">

		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="valide">
						<i class="bi bi-check-circle-fill"></i>
					</div>


				</div>
				<div class="modal-body">
					<div class="container col-12 mt-5">
						<div class="alert alert-success" role="alert">
							<h4 class="alert-heading">Félicitation</h4>
							<p>Votre formulaire a été bien enregistré. </p>
							<h5> Vous pouvez <a href="#">commencer votre simulation</a></h5>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {
			// Trouver le bouton caché par son ID et déclencher son clic
			var hiddenButton = document.getElementById('hiddenButton');
			hiddenButton.click();
		});


  
</script>

</body>
</html>

