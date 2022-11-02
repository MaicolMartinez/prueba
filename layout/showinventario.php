
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>inventarioequipos</title>
    <link rel="stylesheet" href="../css/style.css">
    <?php require_once '../controllers/selectoneInv.php'?>
    <?php require_once '../utils/utils.php' ?>
</head>
<body>
    <h1>Inventario Equipos</h1>
    
        <div class="container-fluid h-100">
        <div class="row ">
        
            <button class="btn btn-primary "> <a href="index.php" class="baa">VOLVER</a></button>
        
        </div>
    </div>

    <?php 
    $inventario = $inventario -> fetch_object();

    $usuario= utils::usuario($inventario->USUARIO_ENCARGADO);
    $usu =$usuario->fetch_object();
     
    $marca= utils::marca($inventario->ID_MARCA);
    $mar =$marca->fetch_object();
   // echo $mar -> NOMBRE;
    $estado= utils::estado($inventario->ID_ESTADO_EQUIPO);
    $est =$estado->fetch_object();

    $tipo= utils::tipo($inventario->ID_TIPO_EQUIPO);
    $tip =$tipo->fetch_object();
    ?>

    <form class="form2">
        <h2>Inventario</h2>

        <figure class="photo-preview">
          <?php if ($inventario->FOTO_EQUIPO == NULL):?>
            <img src="../images/im.png" alt="">
            <?php else: ?>
            <img src="../images/<?=$inventario->FOTO_EQUIPO?>" alt="" class="imgs">
          <?php endif; ?>
        </figure>           


        <div class="scroll">
        <p type="Serial:"> <article class="info-name"><p><?= $inventario -> ID_SERIAL ?></p></article></input></p>
        <p type="Modelo:"> <article class="info-name"><p><?= $inventario -> MODELO ?></p></article></input></p>
        <p type="Descripción:"> <article class="info-name"><p><?= $inventario -> DESCRIPCION ?></p></article></textarea></p>
        <p type="Color:"> <article class="info-name"><p><?= $inventario -> COLOR ?></p></article></p>
        <p type="Fecha de compra:"> <article class="info-name"><p><?= $inventario -> FECHA_DE_COMPRA ?></p></article></input></p>
        <p type="Precio:"> <article class="info-name"><p><?= $inventario -> PRECIO ?></p></article></p>
        <p type="Usuario encargado:">
        <article class="info-name"><p><?= $usu -> NOMBRE ?></p></article>
        </p>
        <p type="Marca:">
        <article class="info-name"><p><?= $mar -> NOMBRE ?></p></article>
            </p>
        <p type="Estado del equipo:">
        <article class="info-name"><p><?= $est -> NOMBRE ?></p></article>
            </p>
        <p type="Tipo de equipo:">
        <article class="info-name"><p><?= $tip -> NOMBRE ?></p></article>
          </p>
        </div>
       
    </form>

    <?php

?>
</body>
</html>

