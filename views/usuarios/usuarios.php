<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/modi_style.css">
    <!-- Compiled and minified CSS -->
    

    <title>Modificar usuario</title>
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
        <img class="logo" src="https://i.postimg.cc/KzWPXR4b/logo-planner-2-1.png" width="90px">
        <h1 class="inline_block letra_grande">Modificar Usuario</h1>
        </header>
    <nav class="inline_block letra_mediana">
        <section class="inline_block">
            <div class="columna_izquierda">
            <li><a href="perfil_admin.php" class="botton">Mi perfil</a></li>
            <li><a href="eliminar_usuario.php" class="botton">Eliminar usuario</a></li>
            <li><a href="crear_admin.php" class="botton">Crear administrador</a></li>
            <li><a href="mod_usuario.php" class="botton">Modificar usuario</a></li>
            <li><a href="Quejas_pet_admin.php" class="botton">Quejas y peticiones</a></li>
            <li><a href="iniciar_sesion.php?cerrar_sesion=1" class="botton">Cerrar sesión</a></li>
            </div>
        </section>
        </nav>
    <div class="seach">
        <input class="buscar inline_block" type="search" name="" placeholder="Buscar">
        <a href="asignar_ficha.php" class="botton">Asignar ficha</a>
    </div>
    <main  class="inline_block cont_info_perfil">
        <table id="tabla">
            <tbody>
                <tr style="height: 70px;">
                    <th colspan="1"><strong>TIPO DOC</strong></th>
                    <th colspan="1"><strong>NUM DOC</strong></th>
                    <th colspan="1"><strong>NOMBRE</strong></th>
                    <th colspan="1"><strong>APELLIDO</strong></th>
                    <th colspan="1"><strong>ROL</strong></th>
                    <th colspan="1"><strong>MODIFICAR</strong></th>
                    <th colspan="1"><strong>ELIMINAR</strong></th>
                 </tr>
            <tr>
                <td><?php echo $row["acronym_doc"];?></td>
                <td><?php echo $row["num_doc"];?></td>
                <td><?php echo $row["names"];?></td>
                <td><?php echo $row["surname"];?></td>
                <td><?php echo $row["type"];?></td>
                <td><a href="actu_mod_user.php?id=<?php echo $row["id"];?>" class="table_del">Modificar</a></td>
                <td><a href="" class="table_del">Eliminar</a></td>
            </tr>
            </tbody>
        </table>
    </main>
</body>
</html>