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
$perfil = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/usuario/perfil.php";
$editerror = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/usuario/erroreditar.php";
$erroremail = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/usuario/erroremail.php";
$erroruser = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/usuario/erroruser.php";

$nombre = $_POST["nombre"];
$user = $_POST["user"];
$email = $_POST["email"];



if (!isset ($_SESSION["token"])){
    $_SESSION["token"] = "NO";
}  
if ($_SESSION["token"] == "SI"){
//los datos

$id = $_SESSION['id'];



$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//toma los datos originales

$sql = "SELECT ID, UserName, Email, Nombre FROM usuariosmiau WHERE ID='$id' ";
$result = $conn->query($sql);


//si obtiene los datos, los pone en variebles de que son originales

if ($result->num_rows > 0) {
 
$row = $result->fetch_assoc();




              $sql = "UPDATE usuariosmiau SET Nombre = '$nombre' WHERE ID='$id' ";

                            if ($conn->query($sql) === TRUE) {
                             header('Location: '.$perfil);
                            } else {
                              echo "Error updating record: " . $conn->error;
                            }
            }


          

            }
        

if ($_SESSION["token"] == "NO") {

    header('Location: '.$paghome);
}
?>




    </body>
</html>