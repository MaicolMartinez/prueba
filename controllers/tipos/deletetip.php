<?php

require_once '../../models/db.php';
require_once '../../models/tipo.php';

	if (isset($_GET["ID_TIPO_EQUIPO"])) {
	    $id = $_GET["ID_TIPO_EQUIPO"];
		$consulta=new Tipo();
		$delete=$consulta->delete($id);
	}
	header("Location:"."../../layout/vistatipo.php");
	//echo $_GET["ID_SERIAL"];
	
?>