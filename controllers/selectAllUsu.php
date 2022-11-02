<?php
 require_once '../models/usuario.php';
 require_once '../models/db.php';

 $user = new Usuario();

 $user = $user -> getAllUsu();

?>