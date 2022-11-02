<?php
 require_once '../models/db.php';
 require_once '../models/estado.php';

 $Est = new Estado();
 $Est -> setIdEstadoEquipo($_GET['ID_ESTADO']);
 $estado = $Est -> getOne();

?>