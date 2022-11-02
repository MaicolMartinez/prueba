<?php
    session_start ();
    require_once '../../models/db.php';
    require_once '../../models/usuario.php';

    if (isset($_POST)) {
        //identificar al usuario
        $DOCUMENTO_DE_IDENTIFICACION=(int)trim($_POST['n_iden']);
        $NOMBRE=trim($_POST['nombre']);
        $EMAIL=trim($_POST['email']);
        $ESTADO=trim($_POST['estado']);
        $FECHA_CREACION=trim($_POST['fecha']);

        //consultar la base de datos
        if (strlen($DOCUMENTO_DE_IDENTIFICACION)>0 && strlen($NOMBRE)>0 && strlen($EMAIL)>0 && strlen($ESTADO)>0  && strlen($FECHA_CREACION)>0) {
        //Envie a guardar

            $Usu=new Usuario();
            $Usu->setNumDocumento($DOCUMENTO_DE_IDENTIFICACION);
            $Usu->setNombre($NOMBRE);
            $Usu->setEmail($EMAIL);
            $Usu->setEstado($ESTADO);
            $Usu->setFechaCreacion($FECHA_CREACION);
        

            $saveusu = $Usu->saveusu();

            if ($saveusu) {
                $_SESSION['mensaje']= "<script>alert('SE GUARDO')</script>";
            }else{

                 $_SESSION['mensaje']= "<script>alert('ERROR AL GUARDAR')</script>";
            }
        }
        
    }
     header("Location:"."../../layout/usuario.php");
?>