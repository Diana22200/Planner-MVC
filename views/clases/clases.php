<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis clases</title>
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/YSjJTb55/logopequenito.png">
    <h1 class="inline_block letra_grande">Mis clases</h1>
    </header>
    <!--Menú de navegación instructor-->
    <nav class="inline_block menu_perfil letra_mediana">
        <ul>
            <li><a href="index.php?c=usuarios&a=vinstructor" class="boton boton_naranja2">Mi perfil</a></li>
            <li><a href="" class="boton_naranja2  boton">Clases</a></li>
            <li><a href="" class="boton_naranja2  boton">Cronograma</a></li>
            <li><a href="" class="boton_naranja2  boton">Quejas y peticiones</a></li>
            <li><a href="" class="boton_naranja2  boton">Añadir clase</a></li>
            <li><a href="index.php?c=login&a=index&cerrar_sesion=1" class="boton_naranja2  boton">Cerrar sesión</a></li>
        </ul>
    </nav>
    <!--Contenido principal de las clases en el perfil instructor-->
            <a href="index.php?c=clases&a=nuevo" class="boton_pequenio boton letra_mediana">Agregar</a>
    <main  class="cont_clases">
    <!--Clase 1-->
     
        <div class="clase centrar ">
        <h2 class="border clase_titulo">Clase</h2>
        <?php foreach($data["clases"] as $dato){
            echo "<ul>";
            echo "<li><span class='negrilla'>Nombre:</span>". $dato["names"]."</li>";
            echo "<li><span class='negrilla'>Apellido:</span>".$dato["surname"]."</li>";
            echo "<li><span class='negrilla'>Código:</span>".$dato["code"]."</li>";
            echo "<li><span class='negrilla'>Estado:</span>".$dato["status"]."</li>";
            echo "<li><span class='negrilla'>Materia:</span>".$dato["subject"]."</li>";
            echo "<a href='index.php?c=clases&a=show_modificar&id=".$dato["id"]."' class='boton_pequenio boton letra_mediana'>Modificar</a>";
            echo "<a href='index.php?c=actividades&a=actividad_adm&id=".$dato["id"]."'>Entrar</a>";
            echo "</ul>";
        }?>

        </div>
    </main>
</body>
</html>