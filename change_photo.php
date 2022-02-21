<?php 
require "db.php";
$id=$_POST['id'];
$path='Avatars/' . time() . $_FILES['avatar']['name'];
move_uploaded_file($_FILES['avatar']['tmp_name'], $path );


$mysql->query("UPDATE users SET `avatar`= '$path' WHERE `id`='$id'");

header('Location: edit_photo');
 ?>