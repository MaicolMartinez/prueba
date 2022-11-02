<?php
 require_once '../models/marca.php';
 require_once '../models/db.php';

 $marca = new Marca();

 $marca = $marca -> getAllMar();

?>