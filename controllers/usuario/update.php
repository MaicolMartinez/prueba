<?php
    require_once '../../models/db.php';
    require_once '../../models/usuario.php';

    if (isset($_POST)) {
        //identificar al usuario
        $DOCUMENTO_DE_IDENTIFICACION=trim($_GET["ID_USUARIO"]);
        $NOMBRE=trim($_POST['nombre']);
        $EMAIL=trim($_POST['email']);
        $ESTADO=trim($_POST['estado']);
       

    
        //consultar la base de datos
        if (strlen($NOMBRE)>0 && strlen($EMAIL)>0 && strlen($ESTADO)>0) {
        //Envie a guardar

            $usuario=new Usuario();
            $usuario->setNumDocumento($DOCUMENTO_DE_IDENTIFICACION);
            $usuario->setNombre($NOMBRE);
            $usuario->setEmail($EMAIL);
            $usuario->setEstado($ESTADO);
            $update = $usuario->update();

            if ($update) {
                echo "<script>alert('ACTUALIZADO CORRECTAMENTE')</script>";
            }else{
                echo "<script>alert('ERROR AL ACTUALIZAR')</script>";
            }
        }
    }
  header("Location:"."../../layout/vistausuario.php");
?>