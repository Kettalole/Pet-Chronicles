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
          </style>
    <title>Inicio</title>
    <script type="text/javascript">
        function GetConfirmation() {
            var RetVal = confirm("¿Desea continuar?");
            if (RetVal == true) {
                document.write("El usuario desea continuar.");
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

        echo "
        <header>
            <div class='contenidoH'>
                <div class='menu'>
                    <a href='home.php' class='logo'>Pet Chronicals <span class='material-symbols-outlined'>pets</span></a>
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
        <body>
            <div class='divEscribir'>
                <a href='escribir.php' class='nuevo'>
                    nuevo post <span class='material-symbols-outlined'>edit_square</span>
                </a>
            </div>";

        $sql = "SELECT ID, TITULO, BLOG, USER, DATEBLOG, IMAGEN_NOMBRE FROM blog ORDER BY ID DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Recorrer cada fila de datos y mostrarla
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='divGeneral'>
                    <div class='divBody'>
                        <div class='divBlog'>
                            <div class='contenedorBlog'>
                                <p class='titulo'>" . $row['TITULO'] . "</p>
                                <p class='autor'>de " . $row['USER'] . "</p>
                                <p class='blog'>" . $row['BLOG'] . "</p>
                                <img class='img' src='../imagenes/$row[IMAGEN_NOMBRE]'  height='300'>
                                <p class='date'>fecha de publicación: " . $row['DATEBLOG'] . "</p>
                                
                            </div>
                        </div>
                    </div>
                </div>";
                
            } 
        } else {
            echo "tabla vacía";
        }
    } else {
        echo "No se encontraron datos de usuario.";
    }

    $conn->close();
} else {
    header('Location: ' . $paghome);
}
?>
</body>
</html>
