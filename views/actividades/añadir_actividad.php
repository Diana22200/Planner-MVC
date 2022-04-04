<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/admin_style.css">
    <title>Añadir Actividad</title>
</head>
<body>      
    
    <a class= "boton boton_pequenio" href="index.php?c=actividades&a=actividad_adm&id=<?php echo $data["id"]?>">Atrás</a>
    <h2>Añadir actividad</h2>
    <form class="tabla"  action="index.php?c=actividades&a=anadir"  method="POST">
            <div>Nombre de la actividad: <input name="title" type="text" placeholder="Nombre de la actividad"></div>
            <div>Descripción de la actividad:<input name="description" type="text" placeholder="Descripción de la actividad"></div>
            <div>Tipo de actividad:
            <select class="select" name="type"  value="<?php  $data["actividades"]["type"];?>">
            <option value="Actividad">Actividad</option>
            <option value="Reunión">Reunión</option>
            <option value="Tarea">Tarea</option>
            <option value="Evaluación">Evaluación </option>
            <option value="Otro">Otro</option>
            </select>
                </div>
            <div>Fecha de entrega:
                <input type="date" name="deadline" id="">
                </select>
            </div>
            <div>Estado:
            <select class="select" name="status"  value="<?php echo  $data["actividades"]["status"];?>">
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
            </select>
            </div>
            <div>Link de la actividad: <input name="link" type="link" placeholder="Link de la actividad"></div>
            <input type="hidden" name="classid" value="<?php echo  $data["id"];?>">
            <input class="button" type="submit" value="Añadir"> 
    </form>
</body>
</html>