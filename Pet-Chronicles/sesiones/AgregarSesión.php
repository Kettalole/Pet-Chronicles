<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          
</head>
<body>
          <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "basemiau";

$usuario = $_POST["user"];
$contra = md5($_POST["pass"]);
$email = $_POST["email"];
$name = $_POST["name"];
$id_primero = 1;

$homepage = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/usuario/home.php";
$signuperror = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/sesiones/sperror.html";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT UserName, Email FROM usuariosmiau WHERE UserName = '$usuario' OR Email = '$email'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
          // Si coincide:
        $row = $result->fetch_assoc();
            


            if($usuario == $row["UserName"] || $email == $row["Email"]){

              
              header('Location: '.$signuperror);
     
            } 
          }
            
          
          
          else {

        $sql = "INSERT INTO usuariosmiau (UserName, Email, Contraseña, Nombre)
       VALUES ('$usuario', '$email', '$contra', '$name')";


$_SESSION["token"] = "SI";


       
         if ($conn->query($sql) === TRUE) {

          $sql = "SELECT ID FROM usuariosmiau WHERE UserName ='$usuario' ";
          $result = $conn->query($sql);
          
     
          if ($result->num_rows > 0) {
            // output data of each row
          $row = $result->fetch_assoc();
   
          $_SESSION["id"] = $row["ID"];
          $_SESSION["token"] = "SI";

          header('Location: '.$homepage);
   
          }

          }else{
            echo "mamahuevo no sirves pa esto xd";
          }


        } 
        
        
    
        
         $conn->close();

      

            ?>
</body>
</html>