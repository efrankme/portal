<?php 

require("mysql.php");

class Usuarios extends Mysql {

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

  function crear($data_usuario=[]){
    foreach($data_usuario as $campo => $valor){
      $$campo = $this->sanitizar($valor);
    }

    $clave = password_hash($clave,PASSWORD_DEFAULT);

    $this->query = "insert into usuarios values('','$usuario','$clave','$email','$nombre','$apellido','$cedula','$fechanac','$telefono','$direccion','$ciudad','$estado','$codigopostal')";
    $this->ejecutar();
  }


  function iniciarSesion($usuario,$clave){
    $this->query = "select * from usuarios where usuario ='$usuario'";
		$this->ejecutarResult();
		if($this->numRows() > 0) {
      foreach ($this->rows[0] as $propiedad=>$valor){
	      $this->$propiedad = $valor;
	    }
      if(password_verify($clave,$this->clave)) {
			  return true;
		  } else {
			  return false; // datos incorrectos
		  }
    } else {
      return false; // datos incorrectos
    }
			
  }


  function consultar(){}

  function editar(){}

  function borrar(){}

}