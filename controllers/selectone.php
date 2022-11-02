<?php
 require_once '../models/db.php';
 require_once '../models/inventario.php';

 $Inve = new Inventario();
 $Inve -> setSerial($_GET['ID_SERIAL']);
 $inventario = $Inve -> getOne();

?>