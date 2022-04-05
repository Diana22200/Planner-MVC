<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/CSS/style_enviarmensaj.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar mensaje</title>
</head>
<body>
    <a href="#" onclick="javascript:history.go(-1)" 
     class="boton_naranja letra_mediana izquierda boton">Atrás</a>
    <h2>Enviar mensaje</h2>
    <form  action="index.php?c=mensaje&a=mensajes_envio" method="POST">
        <section class="tabla">
            
                <div>
                    <label for="email">Correo destinatario</label>
                    <input class="espacio" name="email" id="email" type="text" 
                    value="">
                </div>

                <div>
                    <label for="title">Asunto</label>
                    <input class="espacio" name="title" id="title" type="text" 
                    value="<?php echo  $data["mensajes"]["title"];?>">
                </div>

                <div class="espacio_mensaje">
                    <label for="text">Mensaje</label>
                    <input class="espacio" name="text" id="text" type="text" 
                    value="<?php echo  $data["mensajes"]["text"];?>">
                </div>
    
        <div class="boton_enviar">
        <input type="hidden" name="classid" value="">
           <input class="button" type="submit" value="Enviar"> 
        </div>
        </section>
    </form>
</body>
</html>