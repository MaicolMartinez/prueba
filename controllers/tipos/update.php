<?php
    require_once '../../models/db.php';
    require_once '../../models/tipo.php';

    if (isset($_POST)) {
        //identificar al usuario
        $ID_TIPO_EQUIPO=trim($_GET["ID_TIPO"]);
        $NOMBRE=trim($_POST['nombre']);
        $ESTADO=trim($_POST['estado']);
       

      
        //consultar la base de datos
        if (strlen($NOMBRE)>0 && strlen($ESTADO)>0) {
        //Envie a guardar

            $tipo=new tipo();
            $tipo->setIdTipo($ID_TIPO_EQUIPO);
            $tipo->setNombre($NOMBRE);
            $tipo->setEstado($ESTADO);
            $update = $tipo->update();

            if ($update) {
                echo "<script>alert('ACTUALIZADO CORRECTAMENTE')</script>";
            }else{
                echo "<script>alert('ERROR AL ACTUALIZAR')</script>";
            }
        }
    }
  header("Location:"."../../layout/vistatipo.php");
?>