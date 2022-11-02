<?php 
class Estado{
    
	private $ID_ESTADO;
	private $NOMBRE; 
	private $ESTADO; 
	private $FECHA_CREACION;
	private $FECHA_ACTUALIZACION;
	private $db;

	public function __construct(){
		$this->db=Database::connect();
	}

	function getIdEstado(){
		return $this->ID_ESTADO;
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

	function setIdEstadoEquipo($ID_ESTADO){
		$this->ID_ESTADO=$ID_ESTADO;
	}

	function setNombre($NOMBRE){
		$this->NOMBRE=$this->db->real_escape_string($NOMBRE);
	}


	function setEstado($ESTADO){
		$this->	ESTADO=$this->db->real_escape_string($ESTADO);
	}

	function setFechaCreacion($FECHA_CREACION){
		$this->FECHA_CREACION=$this->db->real_escape_string($FECHA_CREACION);
	}

	function setFechaActualizacion($FECHA_ACTUALIZACION){
		$this->FECHA_ACTUALIZACION = $FECHA_ACTUALIZACION;
	}

	
	public function getAllEst(){
		$estados = $this->db->query("SELECT * FROM estado_equipo ORDER BY ID_ESTADO DESC;");
		return $estados;
	}

	public function getOne(){
		$result=false;

		$sql="SELECT * FROM estado_equipo WHERE ID_ESTADO='{$this->getIdEstado()}'";
		$estado = $this->db->query($sql);

		return $estado;
	}

	public function save(){
		$sql="INSERT INTO estado_equipo VALUES ('{$this->getIdEstado()}','{$this->getNombre()}','{$this->getEstado()}','{$this->getFechaCreacion()}', NULL);";

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
		$sql="DELETE FROM estado_equipo WHERE ID_ESTADO='$id' ";
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
		

		$sql="UPDATE estado_equipo SET  NOMBRE='{$this->getNombre()}', ESTADO='{$this->getEstado()}', FECHA_ACTUALIZACION='{$fecha}'  ";

		$sql .= "WHERE ID_ESTADO ='{$this->getIdEstado()}';";
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