<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/CSS/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar clase</title>
</head>
<body class="fondo1 centrar">
    <!--Botón para volver a la página anterior-->
    <a href="index.php?c=actividades&a=actividad_adm&id=<?php echo $data["actividades"]["id_class"]?>" class="boton_naranja boton letra_mediana izquierda">Atrás</a>
    <!--Título de la página-->   
    <h1 class="letra_grande inline_block">Modificar Actividad <?php echo $data["actividades"]["code"];?></h1>
    <!--Formulario-->
    <form action="index.php?c=actividades&a=modificar" class="formulario border letra_mediana"method="post">
        <ul class="text_left">
        <li><label>Nombre:</label></li>
        <li><input name="title" class="input border letra_pequenia" value="<?php echo  $data["actividades"]["title"];?>"></li>
        <li><label>Estado:</label></li>
        <li>
            <select class="select" name="status"  value="<?php echo  $data["actividades"]["status"];?>">
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
            </select>
        </li>
        <li><label>Descripcion:</label></li>
        <li><input name="description" class="input border letra_pequenia" value="<?php echo  $data["actividades"]["description"];?>"></li>
        
        <li><label>Tipo de actividad:</label></li>
        <li>
            <select class="select" name="type"  value="<?php  $data["actividades"]["type"];?>">
            <option value="Actividad">Actividad</option>
            <option value="Reunión">Reunión</option>
            <option value="Tarea">Tarea</option>
            <option value="Evaluación">Evaluación </option>
            <option value="Otro">Otro</option>
            </select>
        </li>
        <li><label>Fecha límite:</label></li>
        <li><input name="deadline" class="input border letra_pequenia" type="date" value="<?php echo $data["actividades"]["deadline"];?>"></li>
        <input name="id" type="hidden" value="<?php echo $data["actividades"]["id"];?>">
        <li><label>Link de la actividad:</label></li>
        <input name="link" class="input border letra_pequenia" value="<?php echo  $data["actividades"]["link"];?>">
        </ul>
        <input name="id" type="hidden" value="<?php echo $data["id"];?>">
        <!--Botón de enviar-->
        <input type="submit" value="Modificar actividad" class="boton boton_naranja centrar letra_mediana">
    </form>
</body>
</html>