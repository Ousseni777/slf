<?php
session_start();
$state = 0;
include_once "./connectToDB.php";
$msg = "All input fields are required!";

$id_unique = mysqli_real_escape_string($conn, $_POST['id_unique']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($id_unique) && !empty($password)){
    $query = "SELECT *  FROM SLF_USER  WHERE id_unique = '{$id_unique}'";
    $result = $conn->query($query);

     if ($result->num_rows > 0) {
        $row  = $result->fetch_assoc();      
        $user_pass = md5($password);
        $enc_pass = $row['password'];
        $id_unique_user=$row['id_unique'];
        if($user_pass === $enc_pass && $id_unique === $id_unique_user){
            $_SESSION['user']=$row['id_brand'];
            //echo 'Identiant  Exist !';
            header('location: ./sim-fx');
            
        }else{
            $_SESSION['id_unique']=$id_unique;
            $_SESSION['pass']=$password;
            $_SESSION['sms']='Mot de passe ou Identifiant incorrect';
            $_SESSION['state']=1;
            header('location: ./login');
        }
    }else{
        $_SESSION['id_unique']=$id_unique;
        $_SESSION['pass']=$password;
        $_SESSION['sms']="<b>".$id_unique."</b>" . " n'est pas un Identifiant";
        $_SESSION['state']= 1;
        header('location: ./login');
    }
}else{
    $_SESSION['id_unique']=$id_unique;
    $_SESSION['pass']=$password;
    $_SESSION['sms']="Renseignez dans les deux champs";
    $_SESSION['state']= 1;
    header('location: ./login');
}