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
$dbname = "baseingesaurios4apm";

$usuario = $_POST["user"];
$contra = md5($_POST["pass"]);


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT UserName, Email, Contraseña, Nombre, Equipo FROM usuarios WHERE UserName = '$usuario'";

$result = $conn->query($sql);



if ($result->num_rows > 0) {
          // Si coincide:
        $row = $result->fetch_assoc();
            


            if($contra == $row['Contraseña']){

                    echo "Sesión iniciada correctamente";
                    $_SESSION["token"] = "SI";
                    $_SESSION["NombreEquipo"] = $row['Equipo'];
                     $_SESSION["NommbreIntegrante1"] = $row['Nombre'];



            } else{

                    echo "Contraseña incorrecta, intentelo nuevamente.<br>";
            }



           

          
        } else {
          echo "Usuario no existente, registrece para iniciar sesión.<br><br>";
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