<?php 
class Marca{

	private $ID_MARCA;
	private $NOMBRE; 
	private $ESTADO; 
	private $FECHA_CREACION;
	private $FECHA_ACTUALIZACION;
	private $db;

	public function __construct(){
		$this->db=Database::connect();
	}

	function getIdNombreMarca(){
		return $this->ID_MARCA;
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

	function setIdNombreMarca($ID_MARCA){
		$this->ID_MARCA=$ID_MARCA;
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
		$this->FECHA_ACTUALIZACION = $FECHA_ACTUALIZACION;
	}

	
	public function getAllMar(){
		$marcas = $this->db->query("SELECT * FROM marcas ORDER BY ID_MARCA DESC;");
		return $marcas;
	}

	public function getOne(){
		$result=false;

		$sql="SELECT * FROM marcas WHERE ID_MARCA='{$this->getIdNombreMarca()}'";
		$marca= $this->db->query($sql);

		return $marca;
	}

	public function save(){
		$sql="INSERT INTO marcas VALUES ('{$this->getIdNombreMarca()}', '{$this->getNombre()}','{$this->getEstado()}','{$this->getFechaCreacion()}', NULL);";

		
			$save=$this->db->query($sql);
		

		$result=false;
		if ($save) {
			$result=true;
		}
		return $result;
	}

	public function delete($id){
		$sql="DELETE FROM marcas WHERE ID_MARCA='$id' ";
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
		

		$sql="UPDATE marcas SET  NOMBRE='{$this->getNombre()}', ESTADO='{$this->getEstado()}', FECHA_ACTUALIZACION='{$fecha}'  ";

		$sql .= "WHERE ID_MARCA ='{$this->getIdNombreMarca()}';";
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