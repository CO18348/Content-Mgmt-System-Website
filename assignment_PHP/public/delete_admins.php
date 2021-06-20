<?php
require('config.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM admins WHERE id=$id"; 
$result = mysqli_query($db,$query);
header("Location: landing_page.php"); 
?>