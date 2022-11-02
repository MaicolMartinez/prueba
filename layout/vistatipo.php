<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>inventarioequipos</title>
    <link rel="stylesheet" href="../css/style.css">
    <?php require_once '../controllers/selectallTip.php' ?>
</head>
<body>
    <h1>Inventario Equipos</h1>

    <nav>
        <a href="vistatipo.php">Tipo</a>
        <a href="vistaestado.php">Estado</a>
        <a href="vistausuario.php">Usuario</a>
        <a href="vistamarca.php">Marca</a>
        <a href="vistainventario.php">Inventario</a>
        <div class="animation start-home"></div>
    </nav>

    <br>
    <br>
        <div class="container-fluid h-100">
        <div class="row ">
        
            <button class="btn btn-primary "> <a href="tipo.php" class="baa">+ AGREGAR</a></button>
        
        </div>
    </div>

    <div id="main-container">

		<table>
    
			<thead>
				<tr>
                    <th>Nombre</th><th>Estado</th><th>Fecha de creación</th><th class="th2">opciones</th>
				</tr>
			</thead>
            <?php while($tp =$tipo->fetch_object()):?>
            <?php require_once '../utils/utils.php'; ?>
			<tr>
            <td><?=$tp->NOMBRE?></td>
            <td><?=$tp->ESTADO?></td>
            <td><?=$tp->FECHA_CREACION?></td>
            <td class="th2">
                  <button type="button" class="button" ><a href="showtipo.php?ID_TIPO=<?= $tp -> ID_TIPO_EQUIPO?>"><img src="../images/ver.png" /></a></button>
                  <button type="button" class="button"><a href="edittipo.php?ID_TIPO=<?= $tp -> ID_TIPO_EQUIPO?>"><img src="../images/editar.png" /></a></button>
                  <button type="button" class="button" onclick="alerta('<?=$tp->ID_TIPO_EQUIPO?>')"> <img src="../images/borrar.png" /></button>
            </td>
            <?php endwhile; ?>
		</table>
	</div>
</body>
<script src="../js/tipo.js"></script>

</html>

