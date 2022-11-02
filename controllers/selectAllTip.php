<?php
 require_once '../models/tipo.php';
 require_once '../models/db.php';

 $tipo = new tipo();

 $tipo = $tipo -> getAllTip();

?>