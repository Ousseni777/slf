<?php
ob_start();
session_start();
// $_SESSION['client_id']="MOZ-619356449";

if (!isset($_SESSION["client_id"])) {
  header('location: ./login');
}

include './connectToDB.php';

$client_id = $_SESSION['client_id'];

$tagList = array("chrono", "list","new");
// $isOK = false;
// $select_client = "SELECT * FROM `credit_client` WHERE client_id='$client_id' ";
// $result_select_client = $conn->query($select_client);
// if ($result_select_client->num_rows > 0) {
//   $client = $result_select_client->fetch_assoc();
  
//   $isClient = true;
//   if ($client['cin_piece'] == null) {
//     $isOK = false;
//   } else {
//     $isOK = true;
//   }
// } else {
//   $isClient = false;
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>cl | follow</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="assets/css/style-form.css" rel="stylesheet">
  <link href="styles/sim-cl.css" rel="stylesheet">

</head>

<body>

  <?php if (isset($_GET["tag"]) && in_array($_GET["tag"], $tagList)) {
    include 'header-cl.php';

    include 'siderbar-cl.php';
  } else {
    header('location: ./404');
  } 
  if ($_GET["tag"] == "new") { 
    include "new-credit-client.php";
   } ?>


  
<?php  include 'users/client/profile.php'; ?>




  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  

  <!-- <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script> -->
  <script type="text/javascript" src="jquery.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main-form.js"></script>
  <script type="text/javascript" src="javascript/sim-cl.js"></script>

</body>

</html>

<?php
ob_end_flush();
?>