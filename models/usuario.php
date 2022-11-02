<?php 
class Usuario{

	private $DOCUMENTO_DE_IDENTIFICACION;
	private $NOMBRE; 
	private $EMAIL; 
	private $ESTADO; 
	private $FECHA_CREACION; 
	private $FECHA_ACTUALIZACION;
	private $db;

	public function __construct(){
		$this->db=Database::connect();
	}

	function getNumDocumento(){
		return $this->DOCUMENTO_DE_IDENTIFICACION;
	}

	function getNombre(){
		return $this->NOMBRE;
	}

	function getEmail(){
		return $this->EMAIL;
	}


	function getEstado(){
		return $this->ESTADO;
	}

	function getFechaCreacion(){
		return $this->FECHA_CREACION;
	}

	function getFechaActualizacion(){
		return $this->FECHA_ACTUALIZACION;
	}

	//SET - ASIGNAR VALOR AL ATRIBUTO

	function setNumDocumento($DOCUMENTO_DE_IDENTIFICACION){
		$this->DOCUMENTO_DE_IDENTIFICACION=$DOCUMENTO_DE_IDENTIFICACION;
	}

	function setNombre($NOMBRE){
		$this->NOMBRE=$this->db->real_escape_string($NOMBRE);
	}

	function setEmail($EMAIL){
		$this->EMAIL=$this->db->real_escape_string($EMAIL);
	}

	function setEstado($ESTADO){
		$this->ESTADO=$this->db->real_escape_string($ESTADO);
	}

	function setFechaCreacion($FECHA_CREACION){
		$this->FECHA_CREACION=$this->db->real_escape_string($FECHA_CREACION);
	}

	function setFechaActualizacion($FECHA_ACTUALIZACION){
		$this->FECHA_ACTUALIZACION=$this->db->real_escape_string($FECHA_ACTUALIZACION);
	}

	

	public function getAllUsu(){
		$tipos = $this->db->query("SELECT * FROM usuario ORDER BY DOCUMENTO_DE_IDENTIFICACION DESC;");
		return $tipos;
	}

	public function getOne(){
		$result=false;

		$sql="SELECT * FROM usuario WHERE DOCUMENTO_DE_IDENTIFICACION='{$this->getNumDocumento()}'";
		$usuario = $this->db->query($sql);

		return $usuario;
	}


	public function saveusu(){
		$sql="INSERT INTO usuario VALUES ('{$this->getNumDocumento()}','{$this->getNombre()}','{$this->getEmail()}','{$this->getEstado()}','{$this->getFechaCreacion()}', NULL);";

		try {
			$saveusu=$this->db->query($sql);
		} catch (\Throwable $th) {
			
		}

		$result=false;
		if ($saveusu) {
			$result=true;
		}
		
		return $result;

	}

	public function delete($id){
		$sql="DELETE FROM usuario WHERE DOCUMENTO_DE_IDENTIFICACION='$id' ";
		$delete=$this->db->query($sql);

		$result=false;
		if ($delete) {
			$result=true;
		}
		return $result;

	}

	public function update(){
		//sql update 
		date_default_timezone_set( "America/Bogota");
		$fecha = date(format: 'Y-m-d');
		echo $fecha;
		

		$sql="UPDATE usuario SET  NOMBRE='{$this->getNombre()}', EMAIL='{$this->getEmail()}', ESTADO='{$this->getEstado()}', FECHA_ACTUALIZACION='{$fecha}'  ";

		$sql .= "WHERE DOCUMENTO_DE_IDENTIFICACION ='{$this->getNumDocumento()}';";
		//echo $sql;
		//echo "fecha:" . date("Y");
		//die();
		$update=$this->db->query($sql);
		
		//echo $update;
		//die();
		//comprobacion
		$result=false;
		if ($update) {
			$result=true;
		}
		return $result;
	}

	

}



?>