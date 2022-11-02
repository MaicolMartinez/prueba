<?php

require_once '../../models/db.php';
require_once '../../models/usuario.php';

	if (isset($_GET["DOCUMENTO_DE_IDENTIFICACION"])) {
	    $id = $_GET["DOCUMENTO_DE_IDENTIFICACION"];
		$consulta=new Usuario();
		$delete=$consulta->delete($id);
	}
	header("Location:"."../../layout/vistausuario.php");
	//echo $_GET["ID_SERIAL"];
	
?>