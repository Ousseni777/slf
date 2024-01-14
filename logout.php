<?php
session_start();
if (isset($_SESSION['SELLER_ID_UK'])) {
  session_unset();
  session_destroy();
  header("location: ./login");

} else if (isset($_SESSION['CLIENT_ID_UK'])){
  session_unset();
  session_destroy();
  header("location: ./login");
}else{
  $back = "location:" . $_SESSION['page'];
  header($back);
}
?>