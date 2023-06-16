<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

          <title>Sesion iniciada</title>
</head>
<body>
          <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "basemiau";

$usuario = $_POST["user"];
$contra = md5($_POST["pass"]);

$homepage = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/usuario/home.php";
$errorLog = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/sesiones/errorLog.html";
$errorUs = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/sesiones/errorUs.html";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT ID, UserName, Email, Contraseña, Nombre FROM usuariosmiau WHERE UserName = '$usuario'";

$result = $conn->query($sql);



if ($result->num_rows > 0) {
          // Si coincide:
        $row = $result->fetch_assoc();
            


            if($contra == $row['Contraseña']){

              header('Location: '.$homepage);



              $TablaNuevaUs = "tabla_" . $row['UserName'];
                    $_SESSION["token"] = "SI";
                     $_SESSION["id"] = $row['ID'];
                     $_SESSION["tabla"] = $TablaNuevaUs;

                     
                     




            } else{

              header('Location: '.$errorLog);

            }



           

          
        } else {
          header('Location: '.$errorUs);
        }


          ?>

<br><br><br>

<form action="DatosSesion.php">

<button>
Ver datos
</button>

</form>

</body>



</html>