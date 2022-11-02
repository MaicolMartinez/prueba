<?php
    require_once '../../models/db.php';
    require_once '../../models/inventario.php';

    if (isset($_POST)) {
        //identificar al usuario
        $ID_SERIAL=trim($_GET["ID_SERIAL"]);
        $DESCRIPCION=trim($_POST['descripcion']);
        $COLOR=trim($_POST['color']);
        $PRECIO=(int)trim($_POST['precio']);
        $USUARIO_ENCARGADO=trim($_POST['usuario']);
        $ID_MARCA=trim($_POST['marca']);
        $ID_ESTADO_EQUIPO=trim($_POST['estado']);
        $ID_TIPO_EQUIPO=trim($_POST['tipo']);

     
        //consultar la base de datos
        if (strlen($DESCRIPCION)>0 && strlen($COLOR)>0 && strlen($PRECIO)>0 && strlen($USUARIO_ENCARGADO)>0 && strlen($ID_MARCA)>0 && strlen($ID_ESTADO_EQUIPO)>0 && strlen($ID_TIPO_EQUIPO)>0) {
        //Envie a guardar

            $inventario=new Inventario();
            $inventario->setSerial($ID_SERIAL);
            $inventario->setDescripcion($DESCRIPCION);

            if (isset($_FILES['imagen']) ) {
                $file=$_FILES['imagen'];
                $filename=$file['name'];
                $mimetype=$file['type'];
                
                if ($mimetype=='image/jpg' || $mimetype=='image/jpeg' || $mimetype=='image/png' || $mimetype=='image/gif') 
                {
                    if (!is_dir('../images')) {
                        mkdir('../images',0777,true);
                    }
              
                    
                    $inventario->setFoto($filename);
                    move_uploaded_file($file['tmp_name'], '../images/'.$filename);
                }
            }

            $inventario->setColor($COLOR);
            $inventario->setPrecio($PRECIO);
            $inventario->setUsuarioEncargado($USUARIO_ENCARGADO);
            $inventario->setMarca($ID_MARCA);
            $inventario->setEstadoEquipo($ID_ESTADO_EQUIPO);
            $inventario->setTipoEquipo($ID_TIPO_EQUIPO);

            $update = $inventario->update();

            if ($update) {
                echo "<script>alert('ACTUALIZADO CORRECTAMENTE')</script>";
            }else{
                echo "<script>alert('ERROR AL ACTUALIZAR')</script>";
            }
        }
    }
    header("Location:"."../../layout/vistainventario.php");
?>