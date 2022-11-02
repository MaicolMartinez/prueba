<?php
 require_once '../models/inventario.php';
 require_once '../models/db.php';

 $Inven = new Inventario();

 $Inven = $Inven -> getAllInv();

?>