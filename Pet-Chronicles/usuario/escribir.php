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


          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200" />




          <title>Inicio</title>
</head>
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
                
                     
        
                      
        
                             <li><a href='borrar.php' class='volver'><span class='material-symbols-outlined'>
                                     arrow_back_ios
                                </span></a></li>
        
                     
        
        
                <div class='divGeneral'>
        
                        <div class='divBody'>
        
                                
        
        
        
                                <div class='divBlog'>
        
                                        <div class='contenedorBlog'>
        
                                                <form action='subirblog.php' method='post'>


                                                        <textarea type='text' cols='1' rows='auto' class='titulo-input' name='titulo' placeholder='titulo' required></textarea> <br>
                                                        
                                                        <textarea type='text' cols='1' rows='10' class='blog-input' name='blog' placeholder='¿qué nos vas a contar?' required></textarea>
                                                        
                                                        
                                                        <form type='POST' enctype='multipart/formdata' class='img-input'>
                                                                <input type='file' name='imagen' />
                                                        </form> <br>

                                        </div>

                                                        <button type='submit' class='boton-submit'>publicar</button>  
                                                </form>
                                                
        
                                </div>

                                <div class='divEscribir'>

                                        
        
        
                                        <a
                                        href='escribir.php'>
                                                nuevo post <span class='material-symbols-outlined'>
                                                        edit_square
                                                        </span>
                                        </a>


        
                                </div>
        
                        </div> 
        
                </div>
        
        
        
        
        
        
        
        
        
        </body>
</html>
