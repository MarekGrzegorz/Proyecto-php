<?php 

class Viaje
{
	protected string $puerto_salida;
	protected string $foto;
	protected float $precio;

	function __construct(string $puerto_salida, string $foto, float $precio)
	{
		$this -> puerto_salida = $puerto_salida;
		$this -> foto = $foto;
		$this -> precio = $precio;
	}

	public function __destruct(){}

	public function setPuertoSalida(string $puerto_salida){$this -> puerto_salida = $puerto_salida;}
	public function setFoto(string $foto){$this -> foto = $foto;}
	public function setPrecio(float $precio){$this -> precio = $precio;}
	public function getPuertoSalida(){return $this -> puerto_salida;}
	public function getFoto(){return $this -> foto;}
	public function getPrecio(){return $this -> precio;}
}

 ?>