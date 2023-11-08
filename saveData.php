<?php
session_start();
$state = 0;
include_once "./connectToDB.php";

$fname = mysqli_real_escape_string($conn, $_POST['yourFirstName']);
$lname = mysqli_real_escape_string($conn, $_POST['yourLastName']);
$email = mysqli_real_escape_string($conn, $_POST['yourEmail']);

$town = mysqli_real_escape_string($conn, $_POST['yourTown']);
$profession = mysqli_real_escape_string($conn, $_POST['yourProfession']);


$password = mysqli_real_escape_string($conn, $_POST['password1']);
$password2 = mysqli_real_escape_string($conn, $_POST['password2']);

if (isset($_POST['yourEmail']) and isset($_POST['yourFirstName']) and isset($_POST['yourLastName'])  and isset($_POST['yourTown']) and isset($_POST['password1']) and ($_POST['password1'] == $_POST['password2'])) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($conn, "SELECT * FROM sal_user WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            $msg = "$email - This email already exist!";
            $state = 1;
        } else {
            $encrypt_pass = md5($password);
            $insert_query = mysqli_query($conn, "INSERT INTO sal_user (lname, fname, town, pass,email,profession)
                VALUES ('{$lname}','{$fname}', '{$town}', '{$encrypt_pass}', '{$email}', '{$profession}')");
            if ($insert_query) {
                
                $select_sql2 = mysqli_query($conn, "SELECT * FROM sal_user WHERE email = '{$email}'");
                if (mysqli_num_rows($select_sql2) > 0) {
                    $result = mysqli_fetch_assoc($select_sql2);                    
                    header("location: marque");
                }
            } else {
                $msg = "Something went wrong. Please try again!";

                $state = 1;
            }
        }
    } else {
        $msg = "All input fields are required!";

        $state = 1;
    }
} else {
    $msg = "All input fields are required!";
    $state = 1;
}

echo $msg;

// if ($state) {
//     $_SESSION['msg'] = $msg;
//     $_SESSION['state'] = "echec";
//     $_SESSION['fname'] = $fname;
//     $_SESSION['email'] = $email;
//     $_SESSION['bday'] = $bday;
//     $_SESSION['town'] = $town;
//     $_SESSION['quarter'] = $quarter;
//     $_SESSION['phone'] = $phone;
//     $_SESSION['password'] = $password;
//     $_SESSION['lname'] = $lname;
//     $_SESSION['img'] = $img_name;
//     header("location: ./aide-domicile");
// }
