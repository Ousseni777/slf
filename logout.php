<?php
session_start();
if (isset($_SESSION['SELLER_ID'])) {
  session_unset();
  session_destroy();
  header("location: ./login");

} else if (isset($_SESSION['page'])){
  $back = "location:" . $_SESSION['page'];
  header($back);
}else{
  session_unset();
  session_destroy();
  header("location: ./login");
}
?>