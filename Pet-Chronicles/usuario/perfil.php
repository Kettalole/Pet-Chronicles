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
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200" />
          <link rel="stylesheet" href="perfilStyle.css">
          <style>
            body{

                background-image: url('fondoPC2.png');
                background-size: cover;
                
            }
         
          </style>
          <script type="text/javascript">
          <!--
          function GetConfirmation() {

                    var RetVal = confirm("La cuenta se eliminará. ¿Desea continuar?");
                    if (RetVal == true){
                              
                              return true;
                              
                    } else {
                              
                              event.preventDefault();
                            
                    }
                    
          }
          -->
</script>
          <title>Perfil</title>
</head>
 

    
    <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "basemiau";
$paghome = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/sesiones/paghome.html";
$borrarPHP = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/usuario/borrarcuenta.php";


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
        
              <div class='menu'>
        
                      <a href='home.php' class='logo'>Pet Chronicals <span class='material-symbols-outlined'>
                        pets
                        </span></a>
        
                      <nav class='navbar'>
                              <ul>
                                      <li><a href='home.php'><span class='material-symbols-outlined'>
                                              home
                                              </span></a></li>
                                      <li><a href='perfil.php'><span class='material-symbols-outlined'>
                                              account_circle
                                              </span></a></li>
                                        
                                              <li><a href='borrar.php'><span class='material-symbols-outlined'>
                                                logout
                                                </span></a></li>
                              </ul>
                      </nav>
        

              </div>
                      
        </div>
        </header>



    <body> 
    
    <div class='perfil'>
    
    
    <div class='contenedorperfil'>
    <div class='imguser'><img height=80 width=80 src='pfp.png'></img></div> 
    
    <div class='datos'>
        <div class='contenedorDatosPerfil'>

        
    Nombre:
    <p class='datosUs'>
    $row[Nombre]</p>
    
    
    
    Usuario:
    <p class='datosUs'>
    $row[UserName]</p>
    
    
    
    Email:
    <p class='datosUs'>
    $row[Email]</p>

    </div>

    </div>
    <a class='boton' href='editarpf.php'>editar perfil</a>
    <!--<a class='boton' href='borrarcuenta.php' onclick='GetConfirmation()'>eliminar cuenta</a> -->
    <a href='misblogs.php' class='boton2'>mis blogs</a>
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