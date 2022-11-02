<?php

require_once '../../models/db.php';
require_once '../../models/marca.php';

	if (isset($_GET["ID_MARCA"])) {
	    $id = $_GET["ID_MARCA"];
		$consulta=new Marca();
		$delete=$consulta->delete($id);
	}
	header("Location:"."../../layout/vistamarca.php");
	//echo $_GET["ID_SERIAL"];
	
?>