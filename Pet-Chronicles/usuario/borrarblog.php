<?php
session_start();
?>
<html>
    <body>
    <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "basemiau";
$paghome = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/sesiones/paghome.html";
$misblogs = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/usuario/misblogs.php";



if (!isset ($_SESSION["token"])){
    $_SESSION["token"] = "NO";
}  
if ($_SESSION["token"] == "SI"){
//borra la cuenta

$id = $_SESSION['id'];

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);

  
}

//aquí borra el post

$id_blog = $_POST['id'];


$sql = "DELETE FROM blog WHERE ID ='$id_blog'";

if ($conn->query($sql) === TRUE) {

    header('Location: '.$misblogs);
} else {
    echo "Error deleting record: " . $conn->error;
}






} if ($_SESSION["token"] == "NO") {

    header('Location: '.$paghome);

}