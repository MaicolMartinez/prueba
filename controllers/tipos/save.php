<?php
session_start ();
    require_once '../../models/db.php';
    require_once '../../models/tipo.php';

    if (isset($_POST)) {
        //identificar al usuario
        $ID_TIPO_EQUIPO=trim($_POST['Id']);
        $NOMBRE=trim($_POST['Nombre']);
        $ESTADO=trim($_POST['Estado']);
        $FECHA_CREACION=trim($_POST['Fecha']);

        //consultar la base de datos
        if (strlen($ID_TIPO_EQUIPO)>0 && strlen($NOMBRE)>0 && strlen($ESTADO)>0 && strlen($FECHA_CREACION)>0) {
        //Envie a guardar

            $tipo=new tipo();
            $tipo->setIdTipo($ID_TIPO_EQUIPO);
            $tipo->setNombre($NOMBRE);
            $tipo->setEstado($ESTADO);
            $tipo->setFechaCreacion($FECHA_CREACION);
            
            $save = $tipo->save();
            echo $save;
            if ($save) {
                $_SESSION['mensaje']= "<script>alert('SE GUARDO')</script>";
            }else{

                 $_SESSION['mensaje']= "<script>alert('ERROR AL GUARDAR')</script>";
            }
        }
    }
     header("Location:"."../../layout/tipo.php");
?>