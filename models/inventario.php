<?php 
class Inventario{

	private $ID_SERIAL;
	private $MODELO; 
	private $DESCRIPCION; 
	private $FOTO_EQUIPO; 
	private $COLOR;
	private $FECHA_DE_COMPRA;
	private $PRECIO;
    private $USUARIO_ENCARGADO;
	private $ID_MARCA; 
	private $ID_ESTADO_EQUIPO; 
	private $ID_TIPO_EQUIPO; 
	private $db;
	
	public function __construct(){
		$this->db=Database::connect();
	}

	function getSerial(){
		return $this->ID_SERIAL;
	}

	function getModelo(){
		return $this->MODELO;
	}

	function getDescripcion(){
		return $this->DESCRIPCION;
	}

	function getFoto(){
		return $this->FOTO_EQUIPO;
	}

	function getColor(){
		return $this->COLOR;
	}

	function getFechaCompra(){
		return $this->FECHA_DE_COMPRA;
	}
    function getPrecio(){
		return $this->PRECIO;
	}

	function getUsuarioEncargado(){
		return $this->USUARIO_ENCARGADO;
	}

	function getMarca(){
		return $this->ID_MARCA;
	}

	function getEstadoEquipo(){
		return $this->ID_ESTADO_EQUIPO;
	}

	function getTipoEquipo(){
		return $this->ID_TIPO_EQUIPO;
	}

	

	//SET - ASIGNAR VALOR AL ATRIBUTO

	function setSerial($ID_SERIAL){
		$this->ID_SERIAL=$ID_SERIAL;
	}

	function setModelo($MODELO){
		$this->MODELO=$this->db->real_escape_string($MODELO);
	}

	function setDescripcion($DESCRIPCION){
		$this->DESCRIPCION=$this->db->real_escape_string($DESCRIPCION);
	}

	function setFoto($FOTO_EQUIPO){
		$this->FOTO_EQUIPO=$this->db->real_escape_string($FOTO_EQUIPO);
	}

	function setColor($COLOR){
		$this->COLOR=$this->db->real_escape_string($COLOR);
	}

	function setFechaCompra($FECHA_DE_COMPRA){
		$this->FECHA_DE_COMPRA = $this->db->real_escape_string($FECHA_DE_COMPRA);
	}

    function setPrecio($PRECIO){
		$this->PRECIO = $this->db->real_escape_string($PRECIO);
	}

    function setUsuarioEncargado($USUARIO_ENCARGADO){
		$this->USUARIO_ENCARGADO=$this->db->real_escape_string($USUARIO_ENCARGADO);
	}

	function setMarca($ID_MARCA){
		$this->ID_MARCA=$this->db->real_escape_string($ID_MARCA);
	}

	function setEstadoEquipo($ID_ESTADO_EQUIPO){
		$this->ID_ESTADO_EQUIPO=$this->db->real_escape_string($ID_ESTADO_EQUIPO);
	}

	function setTipoEquipo($ID_TIPO_EQUIPO){
		$this->ID_TIPO_EQUIPO=$this->db->real_escape_string($ID_TIPO_EQUIPO);
	}


	public function getAllInv(){
		$inventarios = $this->db->query("SELECT * FROM inventario ORDER BY ID_SERIAL DESC;");
		return $inventarios;
	}

	public function getOne(){
		$result=false;

		$sql="SELECT * FROM inventario WHERE ID_SERIAL='{$this->getSerial()}'";
		$inventario = $this->db->query($sql);

		return $inventario;
	}

	public function saveinv(){
		$sql="INSERT INTO inventario VALUES ('{$this->getSerial()}','{$this->getModelo()}',
		'{$this->getDescripcion()}','{$this->getFoto()}','{$this->getColor()}','{$this->getFechaCompra()}',
		'{$this->getPrecio()}','{$this->getUsuarioEncargado()}','{$this->getMarca()}','{$this->getEstadoEquipo()}',
		'{$this->getTipoEquipo()}' );";

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
		$sql="DELETE FROM inventario WHERE ID_SERIAL='$id' ";
		$delete=$this->db->query($sql);

		$result=false;
		if ($delete) {
			$result=true;
		}
		return $result;

	}

	public function update(){
		//sql update 
	
		$sql="UPDATE inventario SET  DESCRIPCION='{$this->getDescripcion()}', FOTO_EQUIPO='{$this->getFoto()}', COLOR='{$this->getColor()}', PRECIO='{$this->getPrecio()}', USUARIO_ENCARGADO='{$this->getUsuarioEncargado()}', ID_MARCA='{$this->getMarca()}', ID_ESTADO_EQUIPO='{$this->getEstadoEquipo()}', ID_TIPO_EQUIPO='{$this->getTipoEquipo()}' ";

		$sql .= "WHERE ID_SERIAL ='{$this->getSerial()}';";
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