<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>inventarioequipos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Inventario Equipos</h1>

    <nav>
        <a href="tipo.php">Tipo</a>
        <a href="estado.php">Estado</a>
        <a href="usuario.php">Usuario</a>
        <a href="marca.php">Marca</a>
        <a href="inventario.php">Inventario</a>
        <div class="animation start-home"></div>
    </nav>
    <br>
    <br>
        <div class="container-fluid h-100">
        <div class="row ">
        
            <button class="btn btn-primary "> <a href="index.php" class="baa">VOLVER</a></button>
        
        </div>
    </div>

    <form class="form" action="../controllers/tipos/save.php" method="POST"  enctype="multipart/form-data">
        <h2>Tipo de equipo </h2>
        <p type="ID del tipo de equipo:"><input name="Id" placeholder=".."></input></p>
        <p type="Nombre:"><input name="Nombre" placeholder=".."></input></p>
        <p type="Estado:">
            <select name="Estado">
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
        </p>
        <p type="Fecha creación:"><input name="Fecha" type="date"></input></p>
       
        <button>Send</button>
    </form>

    <?php

        if(
            isset ($_SESSION['mensaje'])
        ){
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

    ?>

</body>
</html>

