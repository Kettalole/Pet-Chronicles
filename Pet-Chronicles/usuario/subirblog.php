<?php
session_start();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "basemiau";
$paghome = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/sesiones/paghome.html";
$borrarPHP = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/usuario/borrarcuenta.php";
$home = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/usuario/home.php";

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

    $sql = "SELECT ID, UserName FROM usuariosmiau WHERE ID='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener los datos del usuario
        $row = $result->fetch_assoc();
        $userblog = $row['UserName'];

        // Obtener la fecha actual
        date_default_timezone_set("America/Cancun");
        $dateblog = date("d/m/Y");

        // Obtener los valores del formulario
        $titulo = $_POST['titulo'];
        $blog = $_POST['blog'];

        // Obtener la información de la imagen
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_temp = $_FILES['imagen']['tmp_name'];


        $ruta_destino = "C:/xampp/htdocs/Ingesaurios4APM/Pet-Chronicles/imagenes/$imagen_nombre";

    

        // Mover la imagen al directorio de destino
        if (move_uploaded_file($imagen_temp, $ruta_destino)) {
            // Insertar los datos en la base de datos
            $sql = "INSERT INTO blog (TITULO, BLOG, DATEBLOG, USER, IMAGEN_NOMBRE)
                    VALUES ('$titulo', '$blog', '$dateblog', '$userblog', '$imagen_nombre')";

            if ($conn->query($sql) === TRUE) {
                // Redireccionar al home
                header('Location: ' . $home);
                exit();
            } else {
                echo "Ha ocurrido un error inesperado :[";
            }
        } else {
            echo "Error al mover la imagen al directorio de destino.";
        }
    }
}

$conn->close();
?>
