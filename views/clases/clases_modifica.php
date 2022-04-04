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
    <a href="index.php?c=clases&a=index" class="boton_naranja boton letra_mediana izquierda">Atrás</a>
    <!--Título de la página-->
    <h1 class="letra_grande inline_block">Modificar clase <?php echo $data["clases"]["code"];?></h1>
    <!--Formulario-->
    <form action="index.php?c=clases&a=modificar" class="formulario border letra_mediana"method="post">
        <ul class="text_left">
        <li><label>Materia:</label></li>
        <li><input name="materia" class="input border letra_pequenia" value="<?php echo $data["clases"]["subject"];?>"></li>
        <li><label>Estado:</label></li>
        <li>
            <select class="select" name="status">
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
            </select>
        </li>
        <li><label>Ficha:</label></li>
        <li><input name="ficha" class="input border letra_pequenia" value="<?php echo $data["clases"]["ficha"];?>"></li>
        <input name="id" type="hidden" class="hide" value="<?php echo $data["clases"]["id"];?>">
        <input name="ficha_actu" type="hidden" class="hide" value="<?php echo $data["clases"]["ficha"];?>">
        </ul>
        <!--Botón de enviar-->
        <input type="submit" value="Modificar clase" class="boton boton_naranja centrar letra_mediana">
    </form>
</body>
</html>