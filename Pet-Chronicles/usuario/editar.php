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



          
        if ($user == $row["UserName"] && $email == $row["Email"]){

            echo "el usuario y/o email no estan disponibles";
            header('Location: '.$editerror);

           } 


           if ($user != $row["UserName"] && $email == $row["Email"]){

  $sql = "UPDATE usuariosmiau SET UserName = '$user' WHERE ID='$id' ";

         if ($conn->query($sql) === TRUE) {
      header('Location: '.$perfil);
    } else {
      echo "Error updating record: " . $conn->error;
    }

} 

         if ($user == $row["UserName"] && $email != $row["Email"]){

  $sql = "UPDATE usuariosmiau SET Email ='$email' WHERE ID='$id' ";

  if ($conn->query($sql) === TRUE) {
      header('Location: '.$perfil);
    } else {
      echo "Error updating record: " . $conn->error;
    }

}

     if ($user == $row["UserName"] && $email == $row["Email"] && $nombre != $row["Nombre"]){

       $sql = "UPDATE usuariosmiau SET Nombre = '$nombre'  WHERE ID='$id' ";

if ($conn->query($sql) === TRUE) {
    header('Location: '.$perfil);
  } else {
    echo "Error updating record: " . $conn->error;
  }

} 


       else{

              $sql = "UPDATE usuariosmiau SET UserName = '$user', Email ='$email', Nombre = '$nombre'  WHERE ID='$id' ";

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