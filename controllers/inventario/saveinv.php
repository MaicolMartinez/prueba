<?php
session_start ();
    require_once '../../models/db.php';
    require_once '../../models/inventario.php';

    if (isset($_POST)) {
        //identificar al usuario
        $ID_SERIAL=trim($_POST['serial']);
        $MODELO=trim($_POST['modelo']);
        $DESCRIPCION=trim($_POST['descripcion']);
        $COLOR=trim($_POST['color']);
        $FECHA_DE_COMPRA=trim($_POST['fecha_com']);
        $PRECIO=(int)trim($_POST['precio']);
        $USUARIO_ENCARGADO=trim($_POST['usuario']);
        $ID_MARCA=trim($_POST['marca']);
        $ID_ESTADO_EQUIPO=trim($_POST['estado']);
        $ID_TIPO_EQUIPO=trim($_POST['tipo']);
        
        //consultar la base de datos
        if (strlen($ID_SERIAL)>0 && strlen($MODELO)>0 && strlen($DESCRIPCION)>0 && strlen($COLOR)>0
        && strlen($FECHA_DE_COMPRA)> 0&& strlen($PRECIO)>0 && strlen($USUARIO_ENCARGADO)>0 && strlen($ID_MARCA)>0
        && strlen($ID_ESTADO_EQUIPO)>0 && strlen($ID_TIPO_EQUIPO)>0) {
        //Envie a guardar

            $inven=new Inventario();
            $inven->setSerial($ID_SERIAL);
            $inven->setModelo($MODELO);
            $inven->setDescripcion($DESCRIPCION);
            //guardar imagen
           /*  var_dump($_FILES['imagen']);
                 die(); */
            if (isset($_FILES['imagen']) ) {
                $file=$_FILES['imagen'];
                $filename=$file['name'];
                $mimetype=$file['type'];
                
                if ($mimetype=='image/jpg' || $mimetype=='image/jpeg' || $mimetype=='image/png' || $mimetype=='image/gif') 
                {
                    if (!is_dir('../images')) {
                        mkdir('../images',0777,true);
                    }
              
                    
                    $inven->setFoto($filename);
                    move_uploaded_file($file['tmp_name'], '../images/'.$filename);
                }
            }
            $inven->setColor($COLOR);
            $inven->setFechaCompra($FECHA_DE_COMPRA);
            $inven->setPrecio($PRECIO);
            $inven->setUsuarioEncargado($USUARIO_ENCARGADO);
            $inven->setMarca($ID_MARCA);
            $inven->setEstadoEquipo($ID_ESTADO_EQUIPO);
            $inven->setTipoEquipo($ID_TIPO_EQUIPO);

            $saveinv = $inven->saveinv();

            if ($saveinv) {
                $_SESSION['mensaje']= "<script>alert('SE GUARDO')</script>";
            }else{

                 $_SESSION['mensaje']= "<script>alert('ERROR AL GUARDAR')</script>";
            }
        }
    }
    header("Location:"."../../layout/inventario.php");
?>