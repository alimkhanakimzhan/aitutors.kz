<?php 

session_start();

unset($_SESSION['user']);
unset($_SESSION['feedbacker']);


header("Location: index.php");
 ?>