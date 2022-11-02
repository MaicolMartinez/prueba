<?php

require_once '../../models/db.php';
require_once '../../models/inventario.php';

	if (isset($_GET["ID_SERIAL"])) {
	    $id = $_GET["ID_SERIAL"];
		$consulta=new Inventario();
		$delete=$consulta->delete($id);
	}
	header("Location:"."../../layout/vistainventario.php");
	//echo $_GET["ID_SERIAL"];
	
?>