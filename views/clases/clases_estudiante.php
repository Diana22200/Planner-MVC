<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/CSS/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases Estudiante</title>
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/Y2gQQ63p/logopequenito.png">
    <h1 class="inline_block letra_grande">Clases Estudiante</h1>
    </header>
    <!--Menú de Clases Estudiante-->
    <nav class="inline_block menu_perfil letra_mediana">
        <ul>
            <li><a href="index.php?c=usuarios&a=vaprendiz" class="boton boton_naranja2">Mi perfil</a></li>
            <li><a href="index.php?c=clases&a=clases_stu" class="boton_naranja2  boton">Clases</a></li>
            <li><a href="index.php?c=actividades&a=get_cronograma_est" class="boton_naranja2  boton">Cronograma</a></li>
            <li><a href="Quejas_pet_estudiante.php" class="boton_naranja2  boton">Quejas y peticiones</a></li>
            <li><a href="index.php?c=login&a=index&cerrar_sesion=1" class="boton_naranja2  boton">Cerrar sesión</a></li>
            </ul>
    </nav>
<!--Información de Clases Estudiante-->
        <main  class="cont_clases">
        <?php foreach($data["clases"] as $fila){
        echo"<div class='clase centrar'>";
        echo"<h2 class='border clase_titulo'>Clase".$fila["id"]."</h2>";
        echo"<ul>";
        echo"    <li><span class='negrilla'>Nombre Profesor:</span>" . $fila["names"]."</li>";
        echo"    <li><span class='negrilla'>Apellido Profesor:</span>" . $fila["surname"]. "</li>";
        echo"    <li><span class='negrilla'>Código:</span>". $fila["code"]."</li>";
        echo"    <li><span class='negrilla'>Materia:</span>" .$fila["program_name"] ."</li>";
        echo"</ul>";
        echo"<a href='index.php?c=actividades&a=get_act_std&id=".$fila["id"]."' class='boton_pequenio boton letra_mediana'>Entrar</a>";
        echo "</div>";
    }?>
    </main>
</body>
</html>