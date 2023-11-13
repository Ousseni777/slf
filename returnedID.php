<?php
session_start();
$state = 0;
include_once "./connectToDB.php";
$msg = "All input fields are required!";

$email = mysqli_real_escape_string($conn, $_GET['email']);

if(!empty($email)){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {        
        $query = "SELECT *  FROM SLF_USER  WHERE email = '{$email}'";
        $result = $conn->query($query);
    
        if ($result->num_rows > 0) {                      
            //Traitement ici
            echo "ok";            
        } else {          
            $_SESSION['email']=$email;
            $_SESSION['sms']="$email - Ce mail n'existe pas !";
            $_SESSION['state']=1;
            header('location: ./forgot');
        }
    } else {
    
        $_SESSION['email']=$email;
        $_SESSION['sms']="Email incorrect!";
        $_SESSION['state']=1;
        header('location: ./forgot');
    }
}else{    
    $_SESSION['sms']="Saisir votre Adresse Email";
    $_SESSION['state']=1;
    header('location: ./forgot');
}
echo $msg;