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
    <?php require_once '../models/inventario.php' ?>
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
                $inv = new Inventario();
                $inv -> setSerial($_GET['ID_SERIAL']);
                $inventario = $inv -> getOne();
                 
                 $inventario = $inventario -> fetch_object();
            ?>

        <figure class="photo-preview">
            <?php if ($inventario->FOTO_EQUIPO == NULL):?>
                <img src="../images/im.png" alt="">
                <?php else: ?>
                <img src="../images/<?=$inventario->FOTO_EQUIPO?>" alt="" class="imgs">
            <?php endif; ?>
        </figure> 
		
    <form class="form" action="../controllers/inventario/update.php?ID_SERIAL=<?=$inventario->ID_SERIAL?>" method="POST"  enctype="multipart/form-data">

        <h2>Tipo de equipo </h2>

        <p type="Descripción:"><textarea name="descripcion" ><p><?= $inventario -> DESCRIPCION ?></p></textarea></p>

        <p type="Foto del equipo:"><input name="imagen" type="file" ></input></p>
        
        <p type="Color:"><input name="color" value="<?=$inventario->COLOR ?>"></input></p>

        <p type="Precio:"><input name="precio" value="<?=$inventario->PRECIO ?>"></input></p>

        <p type="Usuario encargado:">
                     <?php $usuarios= utils::showUsuario();?>
		            <select name="usuario" required="">
			    <?php while($usu =$usuarios->fetch_object()):?>
                    <?php if ($inventario->USUARIO_ENCARGADO == $usu->DOCUMENTO_DE_IDENTIFICACION):?>
				    <option value="<?=$usu->DOCUMENTO_DE_IDENTIFICACION?>" selected><?=$usu->NOMBRE?></option>
                    <?php else:?>
                        <option value="<?=$usu->DOCUMENTO_DE_IDENTIFICACION?>"><?=$usu->NOMBRE?></option>
                        <?php endif; ?>
               
                 <?php endwhile; ?>
		        </select>
        </p>

        <p type="Marca:">
            <?php $marcas= utils::showMarca();?>
		            <select name="marca" required="">
			    <?php while($mar =$marcas->fetch_object()):?>
                    <?php if ($inventario->USUARIO_ENCARGADO == $mar->ID_MARCA):?>
				    <option value="<?=$mar->ID_MARCA?>" selected><?=$mar->NOMBRE?></option>
                    <?php else:?>
                        <option value="<?=$mar->ID_MARCA?>"><?=$mar->NOMBRE?></option>
                        <?php endif; ?>
			    <?php endwhile; ?>
		        </select>

        </p>
        <p type="Estado del equipo:">
            <?php $estados= utils::showEstado();?>
		            <select name="estado" required="">
			    <?php while($est =$estados->fetch_object()):?>
                    <?php if ($inventario->USUARIO_ENCARGADO == $est->ID_ESTADO):?>
				    <option value="<?=$est->ID_ESTADO?>" selected><?=$est->NOMBRE?></option>
                    <?php else:?>
                        <option value="<?=$est->ID_ESTADO?>"><?=$est->NOMBRE?></option>
                        <?php endif; ?>
			    <?php endwhile; ?>
		        </select>

        </p>
        <p type="Tipo de equipo:">

             <?php $tipos= utils::showTipo();?>
		            <select name="tipo" required="">
			    <?php while($tip =$tipos->fetch_object()):?>
                    <?php if ($inventario->USUARIO_ENCARGADO == $tip->ID_TIPO_EQUIPO):?>
				    <option value="<?=$tip->ID_TIPO_EQUIPO?>" selected><?=$tip->NOMBRE?></option>
                    <?php else:?>
                        <option value="<?=$tip->ID_TIPO_EQUIPO?>"><?=$tip->NOMBRE?></option>
                        <?php endif; ?>
			    <?php endwhile; ?>
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

