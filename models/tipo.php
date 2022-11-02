<?php 
class tipo{

	private $ID_TIPO_EQUIPO;
	private $NOMBRE; 
	private $ESTADO; 
	private $FECHA_CREACION; 
	private $FECHA_ACTUALIZACION;
	private $db;

	public function __construct(){
		$this->db=Database::connect();
	}

	function getIdTipo(){
		return $this->ID_TIPO_EQUIPO;
	}

	function getNombre(){
		return $this->NOMBRE;
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

	function setIdTipo($ID_TIPO_EQUIPO){
		$this->ID_TIPO_EQUIPO=$ID_TIPO_EQUIPO;
	}

	function setNombre($NOMBRE){
		$this->NOMBRE=$this->db->real_escape_string($NOMBRE);
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

	

	public function getAllTip(){
		$tipos = $this->db->query("SELECT * FROM tipo_de_equipo ORDER BY ID_TIPO_EQUIPO DESC;");
		return $tipos;
	}

	public function getOne(){
		$result=false;

		$sql="SELECT * FROM tipo_de_equipo WHERE ID_TIPO_EQUIPO='{$this->getIdTipo()}'";
		$tipo = $this->db->query($sql);

		return $tipo;
	}

	public function save(){
		$sql="INSERT INTO tipo_de_equipo VALUES ('{$this->getIdTipo()}','{$this->getNombre()}','{$this->getEstado()}','{$this->getFechaCreacion()}', NULL);";

		try {
			$save=$this->db->query($sql);
		} catch (\Throwable $th) {
			//throw $th;
		}

		$result=false;
		if ($save) {
			$result=true;
		}
		return $result;
	}

	public function delete($id){
		$sql="DELETE FROM tipo_de_equipo WHERE ID_TIPO_EQUIPO='$id' ";
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
		//echo $fecha;
		

		$sql="UPDATE tipo_de_equipo SET  NOMBRE='{$this->getNombre()}', ESTADO='{$this->getEstado()}', FECHA_ACTUALIZACION='{$fecha}'  ";

		$sql .= "WHERE ID_TIPO_EQUIPO ='{$this->getIdTipo()}';";
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