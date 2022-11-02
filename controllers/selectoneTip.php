<?php
 require_once '../models/db.php';
 require_once '../models/tipo.php';

 $tip = new Tipo();
 $tip -> setIdTipo($_GET['ID_TIPO']);
 $tipo = $tip -> getOne();

?>