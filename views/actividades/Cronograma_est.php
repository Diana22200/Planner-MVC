
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/CSS/styles_crono_est.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cronograma Estudiante</title>
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/KzWPXR4b/logo-planner-2-1.png">
    <h1 class="inline_block letra_grande">Cronograma general</h1>
    </header>
    <!--Menú de Cronograma-->
        <ul class="contenedor-lista-botones">
        <li class="lista-botns"><a href="index.php?c=usuarios&a=vaprendiz" class="boton_naranja2 boton botn-izq">Atrás</a></li>
    </ul>
    <!--Información del Cronograma-->
    <main  class="inline_block cont_info_perfil_admin">
        <table id="tabla">
            <tbody>
                <tr>
                    <th><strong>TIPO</strong></th>
                    <th><strong>TÍTULO</strong></th>
                    <th><strong>FECHA LÍMITE </strong></th>
                    <th><strong>ESTADO</strong></th>
                    <th><strong>ASIGNATURA</strong></th>
                    <th><strong>CALIFICACION</strong></th>
                 </tr>
                 <?php foreach($data["cronograma_estudiante"] as $fila){ ?> 
                <tr>
                    <td class="obj_tabl"><?php echo $fila['type']?></td>
                    <td class="obj3_tabl"><?php echo $fila['title']?></td>
                    <td class="obj_tabl"><?php echo $fila['deadline']?></td>
                    <td class="obj_tabl"><?php echo $fila['status']?></td>
                    <td class="obj_tabl"><?php echo $fila['subject']?></td>
                    <td class="obj_tabl"><?php echo $fila['score']?></td>
                </tr>
                 <?php
                }
                ?>
            </tbody>
        </table>
    </main>
    <script src= "eli_act.js"></script>
</body>
</html>
