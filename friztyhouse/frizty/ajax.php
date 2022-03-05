<?php 
session_start();
// echo $_POST['name'];
// $_SESSION['c']=$_POST['name'];

print_r($_POST['res']);

$_SESSION['c']=$_POST['res'];

?>