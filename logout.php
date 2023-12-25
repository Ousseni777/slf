<?php
session_start();
if (isset($_SESSION['seller_id'])) {
  session_unset();
  session_destroy();
  header("location: ./login");

} else {
  $back = "location:" . $_SESSION['page'];
  header($back);
}
?>