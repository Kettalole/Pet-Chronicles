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

$homepage = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/usuario/home.html";

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

                    echo "Este usuario o email ya está registrado, inicie sesión.";
     

            } 
          }
            else {

        $sql = "INSERT INTO usuariosmiau (UserName, Email, Contraseña, Nombre)
       VALUES ('$usuario', '$email', '$contra', '$name')";


       
         if ($conn->query($sql) === TRUE) {

          $TablaNuevaUs = "tabla_" . $usuario;
          $crateTableSQL = "CREATE TABLE $TablaNuevaUs
          (
  
          Titulo VARCHAR(150),
          Autor VARCHAR(50),
          Blog VARCHAR (1500000)
          )";

          if ($conn->query($crateTableSQL) === TRUE) {
            header('Location: '.$homepage);
          }else{
            echo "mamahuevo no sirves pa esto xd";
          }


        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
         $conn->close();

      }

            ?>
</body>
</html>