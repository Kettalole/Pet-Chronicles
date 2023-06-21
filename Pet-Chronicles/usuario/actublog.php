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
$misblogs = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/usuario/misblogs.php";

if (!isset($_SESSION["token"])) {
    $_SESSION["token"] = "NO";
}
if ($_SESSION["token"] == "SI") {
    $id = $_SESSION['id'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $titulo = $_POST["titulo"];
    $blog = $_POST["blog"];
    $id_blog = $_POST["idblog"];

    // Verificar si se seleccionó una nueva imagen
    if (!empty($_FILES['imagen']['name'])) {
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_temp = $_FILES['imagen']['tmp_name'];
        $ruta_destino = "C:/xampp/htdocs/Ingesaurios4APM/Pet-Chronicles/imagenes/$imagen_nombre";

        if (move_uploaded_file($imagen_temp, $ruta_destino)) {
            $sql = "UPDATE blog SET TITULO = '$titulo', BLOG = '$blog', IMAGEN_NOMBRE = '$imagen_nombre' WHERE ID = '$id_blog'";

            if ($conn->query($sql) === TRUE) {
                header('Location: ' . $misblogs);
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Error al mover la imagen al directorio de destino.";
        }


    } else {
        $sql = "UPDATE blog SET TITULO = '$titulo', BLOG = '$blog' WHERE ID = '$id_blog'";

        if ($conn->query($sql) === TRUE) {
            header('Location: ' . $misblogs);
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
} elseif ($_SESSION["token"] == "NO") {
    header('Location: ' . $paghome);
}
?>

</body>
</html>
