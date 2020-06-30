<?php

require "mysql.php";

class Usuarios extends Mysql
{
	public $usuario;
	public $email;
	public $nombre;
	public $apellido;
	public $cedula;
	public $fechanac;
	public $telefono;
	public $direccion;
	public $ciudad;
	public $estado;
	public $codigopostal;
	protected $id;
	private $clave;

	public function crear($data_usuario = [])
	{
		foreach ($data_usuario as $campo => $valor) {
			$$campo = $this->sanitizar($valor);
		}

		$clave = password_hash($clave, PASSWORD_DEFAULT);

		$this->query = "insert into usuarios values('','$usuario','$clave','$email','$nombre','$apellido','$cedula','$fechanac','$telefono','$direccion','$ciudad','$estado','$codigopostal',0)";
		$this->ejecutar();
	}

	public function iniciarSesion($usuario, $clave)
	{
		$this->query = "select * from usuarios where usuario ='$usuario'";
		$this->ejecutarResult();
		if ($this->numRows() > 0) {
			foreach ($this->rows[0] as $propiedad => $valor) {
				$this->$propiedad = $valor;
			}
			if (password_verify($clave, $this->clave)) {
				return true;
			} else {
				return false; // datos incorrectos
			}
		} else {
			return false; // datos incorrectos
		}
	}

	public function consultarTodos()
	{
		$this->query =
			"select id, usuario,email,nombre,apellido,fechanac,telefono,ciudad from usuarios";
		$this->ejecutarResultados();
		return $this->rows;
	}


	public function consultar($id = 0)
	{
		$this->query = "select * from usuarios where id = $id";
		$this->ejecutarResult();
		foreach ($this->rows[0] as $campo => $valor) {
			$this->$campo = $valor;
		}
	}


	public function consultarPerfil($usuario)
	{
		$this->query = "select * from usuarios where usuario = '$usuario'";
		$this->ejecutarResult();
		foreach ($this->rows[0] as $campo => $valor) {
			$this->$campo = $valor;
		}
	}


	public function editar($data_usuario = []) {
		foreach ($data_usuario as $campo => $valor) {
			$$campo = $this->sanitizar($valor);
		}
		$this->query = "update usuarios set 
																				nombre = '$nombre',
																				apellido = '$apellido',
																				cedula = '$cedula',
																				email = '$email',
																				telefono = '$telefono',
																				fechanac = '$fechanac',
																				direccion = '$direccion',
																				ciudad = '$ciudad',
																				estado = '$estado',
																				codigopostal = '$codigopostal'
																				where id = $id ";
		$this->ejecutar();
	}


	public function borrar($id=0)
	{
		$this->query = "update usuarios set erased = 1 where id = $id";
		$this->ejecutar();
	}
}
