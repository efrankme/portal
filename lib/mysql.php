<?php 
abstract class Mysql {
	
	private $mysqli;
	protected $query;
	protected $result;
	protected $rows = array();
	
	abstract function consultar();
	abstract function crear();
	abstract function editar();
	abstract function borrar();

	// establece la conexion y selecciona la BD 
	private function conectar() {
		$this->mysqli = new mysqli('localhost', 'root','3226','portal');
		 if ($this->mysqli->connect_error) {
    		echo "Fallo al conectar a MySQL: " . $this->mysqli->connect_error;
    		exit;
		}
	}


	private function cerrar(){
		$this->mysqli->close();
	}
	

	// query simple INSERT, UPDATE, DELETE
	protected function ejecutar() {
		$this->conectar();
		$this->mysqli->query($this->query);
		$this->cerrar();
	}


	// query con result	de 1
	protected function ejecutarResult() {
		$this->conectar();
		$this->result = $this->mysqli->query($this->query);
		while($this->rows[] = $this->result->fetch_assoc());
		array_pop($this->rows);
		$this->result->close();
		$this->cerrar();
	}

	// query con result	
	protected function ejecutarResultados() {
		$this->conectar();
		$this->result = $this->mysqli->query($this->query);
		while($this->rows[] = $this->result->fetch_object());
		array_pop($this->rows);
		$this->result->close();
		$this->cerrar();
	}

	protected function sanitizar($cad){
		$this->conectar();
		return $this->mysqli->real_escape_string($cad);
		$this->cerrar();
	}

	public function numRows(){
		return count($this->rows);
	}
}
?>