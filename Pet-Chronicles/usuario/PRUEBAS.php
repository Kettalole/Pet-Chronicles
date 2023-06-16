<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200" />
          <link rel="stylesheet" href="perfilStyle.css">
          <title>Perfil</title>
</head>
 

    
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
//los datos

$id = $_SESSION['id'];



$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ID, UserName, Email, Nombre FROM usuariosmiau WHERE ID='$id' ";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  // output data of each row
$row = $result->fetch_assoc();


//toda la pagina echo

echo "   
<header>
    <div class='contenidoH'>
                        <p class='logo'>Pet Chronicals</p>
    
                        <div class='adminItems'>
                        <a href='home.php' class='admin'><span class='material-symbols-outlined'>
                        home
                        </span></a>
                                  <a href='perfil.php' class='admin'><span class='material-symbols-outlined'>
                                            account_circle
                                  </span></a>
                            </header>
                            <body> 
                            <div class='perfil'>
                            
                            
                            <div class='contenedorperfil'>
                            <div class='imguser'><img height=80 width=80 src='pfp.png'></img></div> 
                            
                            <div class='datos'>
                                <div class='contenedorDatosPerfil'>
                                <form class='contenedorDatosPerfil' action='editar.php' method='post'>
                                
                            Nombre:
                            <input class='datosUs2' type='text' name='nombre' value='$row[Nombre]' ><br>
                            
                            
                            
                            
                            Usuario:
                            <input class='datosUs2' type='text' name='user' value='$row[UserName]'><br>
                            
                            
                            
                            
                            Email:<br>
                            <input class='datosUs2' type='email' name='email' value='$row[Email]' ><br>
                            <button type='submit' class='botonACTU' >guardar cambios</button>
                            <a class='botonACTU' href='perfil.php'>cancelar</a>
                            </form>
                            </div>
                            
                        </div>
                    
                </div>
                            </div>
                            
                            </body>
";














}

} 

if ($_SESSION["token"] == "NO") {

    header('Location: '.$paghome);

}



          ?>

</html>