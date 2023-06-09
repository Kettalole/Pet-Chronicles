<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page


if (!isset ($_SESSION["token"])){
          $_SESSION["token"] = "NO";
}  
if ($_SESSION["token"] == "SI"){


echo "Integrante: " . $_SESSION["NommbreIntegrante1"] . ".<br><br>";

} 

if ($_SESSION["token"] == "NO") {

echo "No hay sesion activa, inicie sesión en el sistema para acceder";

}

?>

</body>
</html>