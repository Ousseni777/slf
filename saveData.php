

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

