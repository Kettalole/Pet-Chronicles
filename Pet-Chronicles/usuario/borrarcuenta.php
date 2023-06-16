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

$sql = "DELETE FROM usuariosmiau WHERE ID='$id'";

if ($conn->query($sql) === TRUE) {

session_unset();
session_destroy();



    header('Location: '.$paghome);
} else {
    echo "Error deleting record: " . $conn->error;
}


$conn->close();


} if ($_SESSION["token"] == "NO") {

    header('Location: '.$paghome);

}




?>
</body>
</html>