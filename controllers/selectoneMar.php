<?php
 require_once '../models/db.php';
 require_once '../models/marca.php';

 $mar = new Marca();
 $mar -> setIdNombreMarca($_GET['ID_MARCA']);
 $marca = $mar -> getOne();

?>