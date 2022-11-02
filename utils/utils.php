<?php

    $conexion=mysqli_connect('localhost','root','','biblioteca232');

     class utils{
        public static function showUsuario(){

        $conec=("SELECT * FROM usuario ORDER BY DOCUMENTO_DE_IDENTIFICACION ASC;");
        $link=mysqli_connect('localhost','root','','biblioteca232');


        $usuarios = mysqli_query($link, $conec );
        return $usuarios;

	    }

        public static function showMarca(){

            $conec=("SELECT * FROM marcas ORDER BY ID_MARCA ASC;");
            $link=mysqli_connect('localhost','root','','biblioteca232');
    
    
            $marcas = mysqli_query($link, $conec );
            return $marcas;
    
        }

        public static function showEstado(){

            $conec=("SELECT * FROM estado_equipo ORDER BY ID_ESTADO ASC;");
            $link=mysqli_connect('localhost','root','','biblioteca232');
    
    
            $estados = mysqli_query($link, $conec );
            return $estados;
    
        }

        public static function showTipo(){

            $conec=("SELECT * FROM tipo_de_equipo ORDER BY ID_TIPO_EQUIPO ASC;");
            $link=mysqli_connect('localhost','root','','biblioteca232');
    
    
            $tipos = mysqli_query($link, $conec );
            return $tipos;
    
        }

    
        public static function usuario($s){

            $conec=("SELECT NOMBRE FROM usuario WHERE DOCUMENTO_DE_IDENTIFICACION = $s;");
            $link=mysqli_connect('localhost','root','','biblioteca232');
    
    
            $usuario = mysqli_query($link, $conec );
            return $usuario;
    
        }

        public static function marca($s){

            $conec=("SELECT NOMBRE FROM marcas WHERE ID_MARCA = '$s' ;");
            $link=mysqli_connect('localhost','root','','biblioteca232');
    
            //echo $conec;
    
            $marca = mysqli_query($link, $conec );
            //echo $marca;
            return $marca;
            
    
        }

        public static function estado($s){

            $conec=("SELECT NOMBRE FROM estado_equipo WHERE ID_ESTADO = '$s';");
            $link=mysqli_connect('localhost','root','','biblioteca232');
    
    
            $estado = mysqli_query($link, $conec );
            return $estado;
    
        }

        public static function tipo($s){

            $conec=("SELECT NOMBRE FROM tipo_de_equipo WHERE ID_TIPO_EQUIPO = '$s';");
            $link=mysqli_connect('localhost','root','','biblioteca232');
    
    
            $tipo = mysqli_query($link, $conec );
            return $tipo;
    
        }

      

    }



?>