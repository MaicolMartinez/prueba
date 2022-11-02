
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>inventarioequipos</title>
    <link rel="stylesheet" href="../css/style.css">
    <?php require_once '../controllers/selectoneEst.php'?>
    
</head>
<body>
    <h1>Inventario Equipos</h1>
    
        <div class="container-fluid h-100">
        <div class="row ">
        
            <button class="btn btn-primary "> <a href="vistaestado.php" class="baa">VOLVER</a></button>
        
        </div>
    </div>

    <?php 
    $estado = $estado -> fetch_object();

    ?>

    <form class="form">
        <h2>Estado</h2>         

        
        <p type="ID estado:"> <article class="info-name"><p><?= $estado -> ID_ESTADO ?></p></article></input></p>
        <p type="Nombre:"> <article class="info-name"><p><?= $estado -> NOMBRE ?></p></article></input></p>
        <p type="Estado:"> <article class="info-name"><p><?= $estado -> ESTADO ?></p></article></textarea></p>
        <p type="Fecha de creación:"> <article class="info-name"><p><?= $estado -> FECHA_CREACION ?></p></article></p>
      
       
       
    </form>

    <?php

?>
</body>
</html>

