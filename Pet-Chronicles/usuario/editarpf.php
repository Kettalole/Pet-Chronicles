<?php
session_start();
$perfil = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/usuario/perfil.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200" />
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200" />
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200" />
          <link rel="stylesheet" href="perfilStyle.css">
          <style>
            body{

                background-image: url('fondoPC2.png');
                background-size: cover;
                
            }
            .nuevo{
    text-decoration: none;
    font-size: 25px;
  }
  .botonACTUBR {
    font-family: 'Darumadrop One', cursive;
    font-size: 20px;
    border: 1px;
    padding: 10px;
    
    margin: .7px;
    margin-left: 15px;
    margin-right: 15px;
    border-radius: 10px;
    background-color: #5a4531;
    color: #ffffff;
    cursor: pointer ;
    text-decoration: none;
  }

  .contenedorperfil2{
         
         border-radius: 7px;
           background-color: #F4F3EE; 
           height: 590PX;
           width: 400px;
           text-align: center;
           word-wrap: break-word;
           
     
       }


          </style>
          <script type="text/javascript">
          <!--
          function GetConfirmation(event) {

                    var RetVal = confirm("Los cambios se guardarán. ¿Desea continuar?");
                    if (RetVal == true){
                              
                              return true;
                    } else {
                              
                        event.preventDefault();
                            
                    }
                    
          }

          function GetConfirmationDelete(event) {

var RetVal = confirm("La cuenta se borrará. ¿Desea continuar?");
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
        
                      <a href='home.php' class='logo'>Pet Chronicles <span class='material-symbols-outlined'>
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
                            
                            
                            <div class='contenedorperfil2'>
                            <div class='imguser'><img height=80 width=80 src='pfp.png'></img></div> 
                            
                            <div class='datos'>
                                <div class='contenedorDatosPerfil'>
                                <form class='contenedorDatosPerfil' action='editar.php' method='post'>
                                
                            Nombre:
                            <input class='datosUs2' type='text' name='nombre' value='$row[Nombre]' ><br>
                            
                            
                            
                            
                            Usuario:
                            <p class='datosUs'>
                            $row[UserName]</p>
                            
                            
                            
                            Email:
                            <p class='datosUs'>
                            $row[Email]</p>
                            <button type='submit' onclick='GetConfirmation(event)' class='botonACTU'>guardar cambios</button>
                            <a class='botonACTU' href='perfil.php'>cancelar</a>
                            </form>
                            </div>

                         
                            <a onclick='GetConfirmationDelete(event)' class='botonACTUBR' href='borrarcuenta.php'>borrar cuenta</a>
                            

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