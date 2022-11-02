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
    <?php require_once '../utils/utils.php' ?>
</head>
<body>
    <h1>Inventario Equipos</h1>

    <nav>
        <a href="tipo.php">Tipo</a>
        <a href="estado.php">Estado</a>
        <a href="usuario.php">Usuario</a>
        <a href="marca.php">Marca</a>
        <a href="inventario.php">Inventario</a>
        <div class="animation start-contact"></div>
    </nav>
    <br>
    <br>
        <div class="container-fluid h-100">
        <div class="row ">
        
            <button class="btn btn-primary "> <a href="vistainventario.php" class="baa">VOLVER</a></button>
        
        </div>
    </div>

    <form class="form2" action="../controllers/inventario/saveinv.php" method="POST"  enctype="multipart/form-data">
        <h2>Inventario</h2>
        <div class="scroll">
        <p type="Serial:"><input name="serial" placeholder=".."></input></p>
        <p type="Modelo:"><input name="modelo" placeholder=".."></input></p>
        <p type="Descripción:"><textarea name="descripcion" placeholder=".."></textarea></p>
        <p type="Foto del equipo:"><input name="imagen" type="file" ></input></p>
        <p type="Color:"><input name="color" placeholder=".."></input></p>
        <p type="Fecha de compra:"><input type="date" name="fecha_com" placeholder=".."></input></p>
        <p type="Precio:"><input name="precio" placeholder=".."></input></p>
        <p type="Usuario encargado:">
                     <?php $usuarios= utils::showUsuario();?>
		            <select name="usuario" required="">
			    <?php while($usu =$usuarios->fetch_object()):?>
				    <option value="<?=$usu->DOCUMENTO_DE_IDENTIFICACION?>"><?=$usu->NOMBRE?></option>
			    <?php endwhile; ?>
		        </select>
        </p>
        <p type="Marca:">
            <?php $marcas= utils::showMarca();?>
		            <select name="marca" required="">
			    <?php while($mar =$marcas->fetch_object()):?>
				    <option value="<?=$mar->ID_MARCA?>"><?=$mar->NOMBRE?></option>
			    <?php endwhile; ?>
		        </select>

        </p>
        <p type="Estado del equipo:">
            <?php $estados= utils::showEstado();?>
		            <select name="estado" required="">
			    <?php while($est =$estados->fetch_object()):?>
				    <option value="<?=$est->ID_ESTADO?>"><?=$est->NOMBRE?></option>
			    <?php endwhile; ?>
		        </select>

        </p>
        <p type="Tipo de equipo:">

             <?php $tipos= utils::showTipo();?>
		            <select name="tipo" required="">
			    <?php while($tip =$tipos->fetch_object()):?>
				    <option value="<?=$tip->ID_TIPO_EQUIPO?>"><?=$tip->NOMBRE?></option>
			    <?php endwhile; ?>
		        </select>
        </p>
        </div>
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

