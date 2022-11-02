<?php
    require_once '../../models/db.php';
    require_once '../../models/estado.php';

    if (isset($_POST)) {
        //identificar al usuario
        $ID_ESTADO=trim($_GET["ID_ESTADO"]);
        $NOMBRE=trim($_POST['nombre']);
        $ESTADO=trim($_POST['estado']);
       

    
        //consultar la base de datos
        if (strlen($NOMBRE)>0 && strlen($ESTADO)>0) {
        //Envie a guardar

            $estado=new estado();
            $estado->setIdEstadoEquipo($ID_ESTADO);
            $estado->setNombre($NOMBRE);
            $estado->setEstado($ESTADO);
            $update = $estado->update();

            if ($update) {
                echo "<script>alert('ACTUALIZADO CORRECTAMENTE')</script>";
            }else{
                echo "<script>alert('ERROR AL ACTUALIZAR')</script>";
            }
        }
    }
  header("Location:"."../../layout/vistaestado.php");
?>