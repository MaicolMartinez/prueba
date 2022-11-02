<?php

require_once '../../models/db.php';
require_once '../../models/estado.php';

	if (isset($_GET["ID_ESTADO"])) {
	    $id = $_GET["ID_ESTADO"];
		$consulta=new Estado();
		$delete=$consulta->delete($id);
	}
	header("Location:"."../../layout/vistaestado.php");
	//echo $_GET["ID_SERIAL"];
	
?>