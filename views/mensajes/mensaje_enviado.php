<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/CSS/stylosquejas.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje Enviado</title>
</head>
<body class="fondo2">
    <!--Cabecera-->
    <header class="cabecera centrar">
    <img class="logo" src="https://i.postimg.cc/YSjJTb55/logopequenito.png">
    <h1 class="inline_block letra_grande">Mensaje Enviado</h1>
    </header>
    <!--Menú de Cronograma-->
    <nav class="inline_block menu_perfil letra_mediana">
        <ul>
        <li><a href="#" onclick="javascript:history.go(-1)" class="boton_naranja2  boton">Atrás</a></li>
        <li><a href="index.php?c=mensaje&a=recibido" class="boton_naranja2  boton">Bandeja de entrada</a>
          <li><a href="index.php?c=mensaje&a=enviado" class="boton_naranja2  boton">Bandeja de salida</a>
            <li><a href="index.php?c=mensaje&a=message" class="boton_naranja2  boton">Enviar mensaje</a></li>
        </ul>
    </nav>
    <!--Información del Cronograma-->
    <main  class="inline_block cont_info_perfil">
        <table id="tabla">
            <tbody>
                <tr>
                    <th colspan="1"><strong>ID</strong></th>
                    <th colspan="1"><strong>FECHA</strong></th>
                    <th colspan="1"><strong>ASUNTO</strong></th>
                    <th colspan="1"><strong>MENSAJE</strong></th>
                    <th colspan="1"><strong>ESTADO</strong></th>
                    <th colspan="1"><strong>ELIMINAR</strong></th>
                </tr>
                <?php foreach($data["mensaje_enviado"] as $dato){ ?>
                <tr>
                    <td class="obj_tabl_id"><?php echo $dato["Userid"] ?></td>
                    <td class="obj_tabl"><?php echo $dato["shipping_date"] ?></td>
                    <td class="obj2_tabl"><?php echo $dato["title"] ?></td>
                    <td class="obj2_tabl"><?php echo $dato["text"] ?></td>
                    <td class="obj2_tabl"><?php echo $dato["situation"] ?></td>
                    <td class="obj_tabl"><a href="procesar_eli_mensaje_remit.php?id=<?php echo $dato["Userid"] ?>" class="message_del">Eliminar</a></td>
                </tr>
                <?php 
                }?>
            </tbody>
        </table>
    </main>
    <script src="assets/JS/eli_mensaje.js"></script>
</body>
</html>
