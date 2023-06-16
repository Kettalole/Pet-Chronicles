<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables

$paghome = "http://127.0.0.1/Ingesaurios4APM/Pet-Chronicles/sesiones/paghome.html";


session_unset();

// destroy the session
session_destroy();

header('Location: '.$paghome);

?>

</body>
</html>