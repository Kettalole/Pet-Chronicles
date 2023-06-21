<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

<!--
          ESTE A PHP


-->


          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200" />
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200" />
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200" />
          <link rel="stylesheet" href="homeStyle.css">
          <title>Inicio</title>
          <style>
            body{

                background-image: url('fondoPC2.png');
                background-size: cover;
                
            }
            .nuevo{
    text-decoration: none;
    font-size: 25px;
  }
          </style>
          <script type="text/javascript">
          <!--
          function GetConfirmation() {

                    var RetVal = confirm("¿Desea continuear?");
                    if (RetVal == true){
                              document.write("El usuario desea continuar.");
                              return true;
                    } else {
                              event.preventDefault();
                    }
                    
          }
          -->
</script>
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

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id = $_SESSION["id"];

$sql = "SELECT ID, UserName, Email, Nombre FROM usuariosmiau WHERE ID='$id' ";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  // output data of each row
$row = $result->fetch_assoc();
//Selecciona usuario y genera fecha

$userblog = $row['UserName'];
date_default_timezone_set("America/Cancun");
$dateblog = date("d/m/Y");

echo "<header>
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
   
    <div class='divGeneral'>
        <div class='divBody'>
            <div class='divBlog'>
                <div class='contenedorBlog'>
                    <form action='subirblog.php' method='post' enctype='multipart/form-data'>
                        <textarea type='text' cols='1' rows='auto' class='titulo-input' name='titulo' placeholder='titulo' required></textarea><br>
                        <textarea type='text' cols='1' rows='10' class='blog-input' name='blog' placeholder='¿qué nos vas a contar?' required></textarea>
                        <input type='file' name='imagen' accept='image/*' required><br>
                        <button type='submit' class='boton-submit' value='publicar'>publicar</button>
                        <a href='home.php' class='boton-submit'>cancelar</a><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

";
}
} else {
          header('Location: '.$paghome);
  }
  
  ?>

  </html>