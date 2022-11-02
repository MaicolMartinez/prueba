<?php
 require_once '../models/estado.php';
 require_once '../models/db.php';

 $estado = new Estado();

 $estado = $estado -> getAllEst();

?>