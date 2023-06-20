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

$userOG = $row["UserName"];
$emailOG = $row["Email"];

//ahora selecciona el de la base de datos y busca si coinciden

$sql = "SELECT ID, UserName, Email, Contraseña, Nombre FROM usuariosmiau WHERE UserName = '$user' OR Email = '$email'";
$result = $conn->query($sql);


//si existen coincidencias

if ($result->num_rows > 0) {
          // Si coincide:
        $row = $result->fetch_assoc();




//si alguno de los dos coinciden

           if ($user == $row["UserName"] && $email == $row["Email"]){



           //si ambos son los actuales del usuario, solo actualiza el nombre, so XDDD
            if ($user == $userOG && $email == $emailOG){
              $sql = "UPDATE usuariosmiau SET Nombre = '$nombre' WHERE ID='$id' ";

                            if ($conn->query($sql) === TRUE) {
                             header('Location: '.$perfil);
                            } else {
                              echo "Error updating record: " . $conn->error;
                            }
            }


            if ($user == $userOG && $email != $emailOG) { //si el único que coincide es el usuario, entonces el email si está registrado y no se puede actualizar
              header('Location: '.$erroremail);
            }

            if ($user != $userOG && $email == $emailOG) { //si el único que coincide es el email, entonces el usuario ya está registrado y no se puede actualizar
              header('Location: '.$erroruser);
            }

            if ($user != $userOG && $email != $emailOG) { //si ninguno es el original, ambos estan registrados, no se actualiza nada
              header('Location: '.$editerror);
            }     
          } 


          if ($user == $row["UserName"] && $email != $row["Email"]){
            if ($user != $userOG){
              header('Location: '.$erroruser);
            } else{

              $sql = "UPDATE usuariosmiau SET  Email ='$email', Nombre = '$nombre' WHERE ID='$id' ";

if ($conn->query($sql) === TRUE) {
header('Location: '.$perfil);
} else {
echo "Error updating record: " . $conn->error;
}

            }
          }



          if ($user != $row["UserName"] && $email == $row["Email"]){
            if ($email != $emailOG){
              header('Location: '.$erroremail);
            } else{
              $sql = "UPDATE usuariosmiau SET Nombre = '$nombre', UserName = '$user' WHERE ID='$id' ";

if ($conn->query($sql) === TRUE) {
header('Location: '.$perfil);
} else {
echo "Error updating record: " . $conn->error;
}
            }

          }














          


} else {
  
  //si no hay coincidencias, actualiza todo:
$sql = "UPDATE usuariosmiau SET  Email ='$email', Nombre = '$nombre', UserName = '$user' WHERE ID='$id' ";

if ($conn->query($sql) === TRUE) {
header('Location: '.$perfil);
} else {
echo "Error updating record: " . $conn->error;
}

}

}
}

if ($_SESSION["token"] == "NO") {

    header('Location: '.$paghome);
}
?>




    </body>
</html>