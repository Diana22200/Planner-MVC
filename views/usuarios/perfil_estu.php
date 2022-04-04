<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/CSS/stylesb.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/Gp03GJQR/LOGOSENApequenio.png">
    <h1 class="inline_block letra_grande">Mi perfil</h1>
    </header>
    <!--Menú de navegación estudiante-->
    <nav class="inline_block menu_perfil letra_mediana">
        <ul>
        <li><a href="perfil_estudiante.php" class="boton boton_naranja2">Mi perfil</a></li>
        <li><a href="clases_estudiante.php" class="boton_naranja2  boton">Clases</a></li>
        <li><a href="cronograma_general.php" class="boton_naranja2  boton">Cronograma</a></li>
        <li><a href="index.php?c=mensaje&a=recibido" class="boton_naranja2  boton">Quejas y peticiones</a></li>
        <!-- <li><a href="anadir_clase_estudiante.php" class="boton_naranja2  boton">Añadir clase</a></li> -->
        <li><a href="index.php?c=login&a=index&cerrar_sesion=1" class="boton_naranja2  boton">Cerrar sesión</a></li>
        </ul>
    </nav>
    <!--Información del perfil del estudiante-->
    <main  class="inline_block cont_info_perfil">
    <main  class="inline_block cont_info_perfil">
    <?php foreach($data["perfiles"] as $fila){?>
        <img alt="Foto de perfil" width="300px" class="inline_block" src="<?php echo $fila["url_prof_pic"];?>">
        <ul class="inline_block letra_mediana info_perfil">
            <li><span class="negrilla">Nombre:</span><?php echo $fila["names"];?></li>
            <li><span class="negrilla">Apellido:</span><?php echo $fila["surname"];?></li>
            <li><span class="negrilla">Correo:</span><?php echo $fila["email"];?></li>
            <li><span class="negrilla">Número de documento:</span><?php echo $_SESSION['numero_docu'];?></li>
            <li><span class="negrilla">Tipo de documento:</span><?php echo $_SESSION['tipo_docu'];?></li>
            <li><a href="nombredoc.html" class="link">Cambiar Datos</a></li>
        </ul>
        <?php 
            }?>
    </main>
</body>
</html>
