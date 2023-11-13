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

