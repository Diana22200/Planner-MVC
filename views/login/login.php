<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="CSS/styleinicio.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <!--Iniciar sesión-->
    <a class="boton_naranja" href="index.html">Atrás</a>
    <h2 class="titulo">Inicio de sesión</h2>
    <form id="login" name="login" method="POST" action="index.php?c=login&a=index" autocomplete="off">
        <section class="tabla">
            <p>Tipo de documento 
                <div><select class="select" name="tipo_doc" id="">
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="CC">Cédula de Ciudadania</option>
                    <option value="Pas">Pasaporte</option>
                    <option value="DNI">Documento Nacional de Identificación</option>
                    <option value="NIT">Número de Identificación Tributaria</option>
                </select></div>
            </p>

            <p>Número de documento 
                <div><input class="espacio" type="text" name="num_doc" placeholder="Número de documento"></div></p>
            <p>Contraseña 
                <div>
                <input class="espacio" type="password" name="password" placeholder="Ingrese contraseña">
                </div>
            </p>
           <input class="boton button" type="submit" value="Iniciar sesión"> 
        </section>
        ¿No tienes cuenta? <a href="index.php?c=login&a=registrarse">Registrarse</a>
    </form>
</body>
</html>