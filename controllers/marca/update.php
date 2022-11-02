<?php
    require_once '../../models/db.php';
    require_once '../../models/marca.php';

    if (isset($_POST)) {
        //identificar al usuario
        $ID_MARCA=trim($_GET["ID_MARCA"]);
        $NOMBRE=trim($_POST['nombre']);
        $ESTADO=trim($_POST['estado']);
       

   
        //consultar la base de datos
        if (strlen($NOMBRE)>0 && strlen($ESTADO)>0) {
        //Envie a guardar

            $marca=new Marca();
            $marca->setIdNombreMarca($ID_MARCA);
            $marca->setNombre($NOMBRE);
            $marca->setEstado($ESTADO);
            $update = $marca->update();

            if ($update) {
                echo "<script>alert('ACTUALIZADO CORRECTAMENTE')</script>";
            }else{
                echo "<script>alert('ERROR AL ACTUALIZAR')</script>";
            }
        }
    }
  header("Location:"."../../layout/vistamarca.php");
?>