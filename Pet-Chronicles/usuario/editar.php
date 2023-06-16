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
$sql = "SELECT ID, UserName, Email, Contraseña, Nombre FROM usuariosmiau WHERE UserName = '$user' OR Email = '$email'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
          // Si coincide:
        $row = $result->fetch_assoc();




//si solo el email no esta disponible

           if ($user != $row["UserName"] && $email == $row["Email"]){

header('Location: '.$erroremail);


} 

//si solo el usuario no está disponible

         if ($user == $row["UserName"] && $email != $row["Email"]){
         
          header('Location: '.$erroruser);
          

}


//si ninguno está disponible

     if ($user == $row["UserName"] && $email == $row["Email"]){

     
    header('Location: '.$editerror);
 
     }

//si todos estn disponibles

if ($user != $row["UserName"] && $email != $row["Email"] && $nombre != $row["Nombre"]){

  $sql = "UPDATE usuariosmiau SET  Email ='$email', Nombre = '$nombre', UserName = '$user' WHERE ID='$id' ";

if ($conn->query($sql) === TRUE) {
header('Location: '.$perfil);
} else {
echo "Error updating record: " . $conn->error;
}



}

//si ninguno está disponible PERO el nombre cambia

if ($user == $row["UserName"] && $email == $row["Email"] && $nombre != $row["Nombre"]){

  $sql = "UPDATE usuariosmiau SET Nombre = '$nombre'  WHERE ID='$id' ";

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