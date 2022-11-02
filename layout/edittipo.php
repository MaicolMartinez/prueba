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
    <?php require_once '../models/tipo.php' ?>
    <?php require_once '../models/db.php' ?>
</head>
<body>



    <h1>Inventario Equipos</h1>

 
        <div class="container-fluid h-100">
        <div class="row ">
        
            <button class="btn btn-primary "> <a href="index.php" class="baa">VOLVER</a></button>
        
        </div>
    </div>

    <?php 
                 $tip = new Tipo();
                 $tip -> setIdTipo($_GET['ID_TIPO']);
                 $tipo = $tip -> getOne(); 
                 
                 $tipo = $tipo -> fetch_object();
            ?>

		
    <form class="form" action="../controllers/tipos/update.php?ID_TIPO=<?=$tipo->ID_TIPO_EQUIPO?>" method="POST"  enctype="multipart/form-data">
        <h2>Tipo de equipo </h2>
        
        <p type="Nombre:"><input name="nombre" value="<?=$tipo->NOMBRE ?>"></input></p>

        <p type="Estado:">
            
            <select name="estado">

                    <?php if($tipo->ESTADO == "Activo"):?>
                        <option value="Activo" selected="true">Activo</option>
                        <option value="Inactivo" >Inactivo</option>
                    <?php else: ?>
                        <option value="Inactivo"  selected="true">Inactivo</option>
                        <option value="Activo" >Activo</option>
                    <?php endif; ?>
            </select>
        </p>
       
       
        <button>Actualizar</button>
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

