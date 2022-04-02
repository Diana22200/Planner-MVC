<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/CSS/styles_clase1.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase 1</title>
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/KzWPXR4b/logo-planner-2-1.png">
    <h1 class="inline_block letra_grande">Clase 1</h1>
    </header>
    <!--Menú de Cronograma-->
    <nav class="inline_block menu_perfil letra_mediana">
        <ul>
        <li><a href="clases_estudiante.php" class="boton_naranja2  boton">Atrás</a></li>
        <li><a href="cronograma_general_estudiante.php" class="boton_naranja2  boton">Ver actividades</a></li>
        </ul>
    </nav>
    <!--Información del Cronograma-->
    <main  class="inline_block cont_info_perfil">
        <table id="tabla">
            <tbody>
                <tr>
                    <th colspan="1"><strong>FECHA</strong></th>
                    <th colspan="1"><strong>ACTIVIDAD</strong></th>
                    <th colspan="1"><strong>ESTADO</strong></th>
                    <th colspan="1"><strong>CALIFICACIÓN</strong></th>
                </tr>
                <?php foreach($data["clase_1"] as $dato){ ?>
                <tr>
                    <td class="obj4_tabl"><?php echo $dato["deadline"];?></td>
                    <td class="obj4_tabl"><?php echo $dato["title"];?></td>
                    <td class="obj4_tabl"><?php echo $dato["status"];?></td>
                    <td class="obj_tabl"><?php echo $dato["score"];?></td>
                </tr>
                <?php
                }?>
            </tbody>
        </table>
    </main>
</body>
</html>