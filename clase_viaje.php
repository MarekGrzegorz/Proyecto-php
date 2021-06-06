<?php 
class Viaje
{
    protected int       $id; 
    protected string    $nombre; 
    protected string    $directorio; 
    protected int       $activo; 
    protected string    $imgPagPrinc; 
    protected string    $altPagPrinc; 
    protected string    $slider1; 
    protected string    $altslider1; 
    protected string    $slider2; 
    protected string    $altslider2; 
    protected string    $slider3; 
    protected string    $altslider3; 
    protected string    $titulo; 
    protected string    $description; 
    protected string    $proveedor; 
    protected string    $puerto; 
    protected string    $fechainicio; 
    protected string    $fechafin; 
    protected string    $preparacion; 
    protected int       $placas; 
    protected float     $precio; 

public function __construct()
{
    $this->id=0; 
    $this->nombre=''; 
    $this->directorio=''; 
    $this->activo=0; 
    $this->imgPagPrinc=''; 
    $this->altPagPrinc=''; 
    $this->slider1=''; 
    $this->altslider1=''; 
    $this->slider2=''; 
    $this->altslider2=''; 
    $this->slider3=''; 
    $this->altslider3=''; 
    $this->titulo=''; 
    $this->description=''; 
    $this->proveedor=''; 
    $this->puerto=''; 
    $this->fechainicio=''; 
    $this->fechafin=''; 
    $this->preparacion=''; 
    $this->placas=0; 
    $this->precio=0.0 ;
}

public function __destruct(){}

public function setid($id_){ $this->id = $id_;} 
public function setnombre($nombre_){ $this->nombre = $nombre_;} 
public function setdirectorio($directorio_){ $this->directorio = $directorio_;} 
public function setactivo($activo_){ $this->activo = $activo_;} 
public function setimgPagPrinc($imgPagPrinc_){ $this->imgPagPrinc = $imgPagPrinc_;} 
public function setaltPagPrinc($altPagPrinc_){ $this->altPagPrinc = $altPagPrinc_;} 
public function setslider1($slider1_){ $this->slider1 = $slider1_;} 
public function setaltslider1($altslider1_){ $this->altslider1 = $altslider1_;} 
public function setslider2($slider2_){ $this->slider2 = $slider2_;} 
public function setaltslider2($altslider2_){ $this->altslider2 = $altslider2_;} 
public function setslider3($slider3_){ $this->slider3 = $slider3_;} 
public function setaltslider3($altslider3_){ $this->altslider3 = $altslider3_;} 
public function settitulo($titulo_){ $this->titulo = $titulo_;} 
public function setdescription($description_){ $this->description = $description_;} 
public function setproveedor($proveedor_){ $this->proveedor = $proveedor_;} 
public function setpuerto($puerto_){ $this->puerto = $puerto_;} 
public function setfechainicio($fechainicio_){ $this->fechainicio = $fechainicio_;} 
public function setfechafin($fechafin_){ $this->fechafin = $fechafin_;} 
public function setpreparacion($preparacion_){ $this->preparacion = $preparacion_;} 
public function setplacas($placas_){ $this->placas = $placas_;} 
public function setprecio($precio_) { $this->precio = $precio_;}

public function getPuerto(){return $this->puerto;}
public function getPrecio(){return $this->precio;}
    

public function setAttrib(int $id, string $nombre, string $directorio, int $activo, string $imgPagPrinc, string $altPagPrinc, string $slider1,
        string $altslider1, string $slider2, string $altslider2, string $slider3, string $altslider3, string $titulo, string $description,
        string $proveedor, string $puerto, string $fechainicio, string $fechafin, string $preparacion, int $placas, float $precio)
{
    $this->id=$this->setid($id); 
    $this->nombre=$this->setnombre($nombre); 
    $this->directorio=$this->setdirectorio($directorio); 
    $this->activo=$this->setactivo($activo); 
    $this->imgPagPrinc=$this->setimgPagPrinc($imgPagPrinc); 
    $this->altPagPrinc=$this->setaltPagPrinc($altPagPrinc); 
    $this->slider1=$this->setslider1($slider1); 
    $this->altslider1=$this->setaltslider1($altslider1); 
    $this->slider2=$this->setslider2($slider2); 
    $this->altslider2=$this->setaltslider2($altslider2); 
    $this->slider3=$this->setslider3($slider3); 
    $this->altslider3=$this->setaltslider3($altslider3); 
    $this->titulo=$this->settitulo($titulo); 
    $this->description=$this->setdescription($description); 
    $this->proveedor=$this->setproveedor($proveedor); 
    $this->puerto=$this->setpuerto($puerto); 
    $this->fechainicio=$this->setfechainicio($fechainicio); 
    $this->fechafin=$this->setfechafin($fechafin); 
    $this->preparacion=$this->setpreparacion($preparacion); 
    $this->placas=$this->setplacas($placas); 
    $this->precio=$this->setprecio($precio) ;
}
}

 ?>