<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200">
    <link rel="stylesheet" href="homeStyle.css">
    <style>
            body{

                background-image: url('fondoPC2.png');
                background-size: cover;
                
            }
            .nuevo{
    text-decoration: none;
    font-size: 25px;
  }

  .nohay {

text-align: center;
padding: 30px;
background-color: #ffffff;
width: auto;
height: auto;
margin: 70px;
margin-top: 200px;
color: #775343;
font-family: 'Geologica', sans-serif;
border-radius: 10px;
font-size: 30px;

}

.botonACTU{
    
    font-family: 'Darumadrop One', cursive;
    font-size: 20px;
    border: 1px;
    padding: 10px;
    margin: 10px;
    margin-bottom: 25px;
    border-radius: 10px;
    background-color: #5a4531;
    color: #ffffff;
    cursor: pointer ;
    text-decoration: none;
  }

  .misBotones{
    
     margin-left: 495px;
      display: flex;
      
 

  }
          </style>
    <title>Inicio</title>
    <script type="text/javascript">
        function GetConfirmation() {
            var RetVal = confirm("Los cambios se guardarán. ¿Desea continuar?");
            if (RetVal == true) {
                
                return true;
            } else {
                event.preventDefault();
            }
        }
    </script>
</head>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "basemiau";
$paghome = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/sesiones/paghome.html";
$borrarPHP = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/usuario/borrarcuenta.php";

if (!isset($_SESSION["token"])) {
    $_SESSION["token"] = "NO";
}

if ($_SESSION["token"] == "SI") {
    // Conectar a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_SESSION["id"];

    $sql = "SELECT ID, UserName, Email, Nombre FROM usuariosmiau WHERE ID='$id' ";
    $result = $conn->query($sql);

    

    if ($result->num_rows > 0) {
        // Obtener los datos del usuario
        $row = $result->fetch_assoc();
        $userblog = $row['UserName'];
        $user = $row["UserName"];
        $id_blog = $_POST['id'];

        echo "
        <header>
            <div class='contenidoH'>
                <div class='menu'>
                    <a href='home.php' class='logo'>Pet Chronicles <span class='material-symbols-outlined'>pets</span></a>
                    <nav class='navbar'>
                        <ul>
                            <li><a href='home.php'><span class='material-symbols-outlined'>home</span></a></li>
                            <li><a href='perfil.php'><span class='material-symbols-outlined'>account_circle</span></a></li>
                            <li><a href='borrar.php'><span class='material-symbols-outlined'>logout</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
       ";

        $sql = "SELECT ID, TITULO, BLOG, IMAGEN_NOMBRE FROM blog WHERE ID ='$id_blog' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Recorrer cada fila de datos y mostrarla
            while ($row = $result->fetch_assoc()) {


                echo "
                <body>
   
                <div class='divGeneral'>
                    <div class='divBody'>
                        <div class='divBlog'>
                            <div class='contenedorBlog'>
                                <form action='actublog.php' method='post' enctype='multipart/form-data'>
                                    <textarea type='text' cols='1' rows='auto' class='titulo-input' name='titulo' placeholder='titulo' required>$row[TITULO]</textarea><br>
                                    <textarea type='text' cols='1' rows='10' class='blog-input' name='blog' placeholder='¿qué nos vas a contar?' required>$row[BLOG]</textarea>
                                    <input type='file' name='imagen' accept='image/*'><br>
                                    <img class='img' src='../imagenes/$row[IMAGEN_NOMBRE]'  height='150'><br>
                                    <input type='hidden' name='idblog' value ='$id_blog'>
                                    <button type='submit' onclick='GetConfirmation(event)' class='boton-submit' value='publicar'>guardar</button>
                                    <a href='misblogs.php' class='boton-submit'>cancelar</a><br><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            ";
                                
                              } 
                    } 
} 

    $conn->close();
} else {
          header('Location: ' . $paghome);
}
?>


</body>
</html>
