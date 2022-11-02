<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>inventarioequipos</title>
    <link rel="stylesheet" href="../css/style.css">
    <?php require_once '../controllers/selectallEst.php' ?>
</head>
<body>
    <h1>Inventario Equipos</h1>

    <nav>
        <a href="vistatipo.php">Tipo</a>
        <a href="vistaestado.php">Estado</a>
        <a href="vistausuario.php">Usuario</a>
        <a href="vistamarca.php">Marca</a>
        <a href="vistainventario.php">Inventario</a>
        <div class="animation start-about"></div>
    </nav>

    <br>
    <br>
        <div class="container-fluid h-100">
        <div class="row ">
        
            <button class="btn btn-primary "> <a href="estado.php" class="baa">+ AGREGAR</a></button>
        
        </div>
    </div>

    <div id="main-container">

		<table>
    
			<thead>
				<tr>
                    <th>Nombre</th><th>Estado</th><th>Fecha de creación</th><th class="th2">Opciones</th>
				</tr>
			</thead>
            <?php while($es =$estado->fetch_object()):?>
            <?php require_once '../utils/utils.php'; ?>
			<tr>
            <td><?=$es->NOMBRE?></td>
            <td><?=$es->ESTADO?></td>
            <td><?=$es->FECHA_CREACION?></td>
            <td class="th2">
                <button type="button" class="button"><a href="showestado.php?ID_ESTADO=<?= $es -> ID_ESTADO?>"><img src="../images/ver.png" /></a></button>
                <button type="button" class="button"><a href="editestado.php?ID_ESTADO=<?= $es -> ID_ESTADO?>"><img src="../images/editar.png" /></a></button>
                <button type="button" class="button" onclick="alerta('<?=$es->ID_ESTADO?>')"> <img src="../images/borrar.png" /></button>
            </td>
            <?php endwhile; ?>
		</table>
	</div>
</body>
<script src="../js/estado.js"></script>
</html>

