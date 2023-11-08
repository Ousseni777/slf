
<?php
session_start();

if (isset($_POST['email']) and isset($_POST['password'])) {
    include_once "./connectToDB.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = mysqli_query($conn, "SELECT * FROM sal_user WHERE email = '{$email}'");
    
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $user_pass = md5($password);
        $enc_pass = $row['pass'];
        echo $row['email']."  ".$enc_pass;
        if ($user_pass === $enc_pass) {                      
            header("location: marque");
        } else {
            // $_SESSION['msg_log'] = "Email or Password is Incorrect!";
            // $_SESSION['state_log'] = "echec";
            // header("location: marque");
        }
    } else {
        // $_SESSION['msg_log'] = "$email - This email not Exist!";
        // $_SESSION['state_log'] = "echec";
        // header("location:register");
    }
} else {
    // $_SESSION['msg_log'] = $_POST['email'] . "All input fields are required!" . $_POST['password'];
    // $_SESSION['state_log'] = "echec";
    // header("location:register");
}
?>