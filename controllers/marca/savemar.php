<?php
    require_once '../../models/db.php';
    require_once '../../models/marca.php';

    if (isset($_POST)) {
        //identificar al usuario
        $ID_MARCA=trim($_POST['idmarca']);
        $NOMBRE=trim($_POST['Nombre']);
        $ESTADO=trim($_POST['Estado']);
        $FECHA_CREACION=trim($_POST['Fecha']);

        //consultar la base de datos
        if (strlen($ID_MARCA)>0 && strlen($NOMBRE)>0 && strlen($ESTADO)>0 && strlen($FECHA_CREACION)>0) {
        //Envie a guardar

            $marca=new Marca();
            $marca->setIdNombreMarca($ID_MARCA);
            $marca->setNombre($NOMBRE);
            $marca->setEstado($ESTADO);
            $marca->setFechaCreacion($FECHA_CREACION);
            
            $save = $marca->save();
            echo $save;
            if ($save) {
                echo "<script>alert('SE GUARDO')</script>";
            }else{
                echo "<script>alert('ERROR AL GUARDAR')</script>";
            }
        }
    }
     header("Location:"."../../layout/marca.php");
?>