<?php
include('DB.php');
include('clase_viaje.php');

class Contenido{
   protected $errorDB = false;
   protected $db_1;
   protected string $Dir_X = "ViajesEspacio/";
   protected $ViajesEspacioArray; 
   public $arrayDeDatosDB;

public function __construct(){
   $this->ViajesEspacioArray = array(); 
   $this->db_1 = new DB();
   if( $this->db_1->DBconn()){$this->setErrorDB(false);$this->db_1->DBexit();} 
   else{ $this->setErrorDB(true);}

   try{
      $this->openCatalogoGeneral();
   }catch (Exception $e){
      echo $e->getMessage();
   }
}

protected function openCatalogoGeneral(){
   $dir = opendir($this->Dir_X);
   if($dir){
      while($dirElem = readdir($dir)) {
         try{
            if (is_dir("$this->Dir_X$dirElem") && $dirElem != "." && $dirElem != ".."){
               array_push($this->ViajesEspacioArray,"$this->Dir_X$dirElem") ;
               }
         }catch(RuntimeException $e){ throw $e;}
   }
      closedir($dir);
   }else{ 
      throw new Exception ("No existe ningun catalogo en directorio principal '$this->Dir_X'");
   }
   if ( ! $this->errorDB) { $this->comparaDatosConDB();}
   else { 
      $this->errorDB = true; 
      $this->arrayDeDatosDB = new ArrayObject();
      $this->addDatosToFile();}
}

protected function comparaDatosConDB(){
   $user_arr = array();
   try{ $this->db_1->DBconn(); } 
   catch (Exception $e) {echo  $e->getMessage(); }
   // resultados guardados en DB
   if ($result = mysqli_query($this->db_1->getConn(), "SELECT directorio FROM Viajes WHERE activo = 1")) {
      while($row = mysqli_fetch_row($result)){
         array_push($user_arr, $row[0]) ; 
      }
      mysqli_free_result($result);
   }
   $this->db_1->DBexit();
   // comprobacin de los diferencias entre carpeta y DB
   $difDesactualizados = array_diff( $user_arr, $this->ViajesEspacioArray );
   $difNuevosEnCatalogo = array_diff( $this->ViajesEspacioArray, $user_arr ); 

   if (count($difDesactualizados) != 0 ){
      try{ $this->db_1->DBconn(); } 
      catch (Exception $e) {echo  $e->getMessage(); }
      foreach ($difDesactualizados as $i)  {
         $sql = "UPDATE Viajes  SET activo = 0 WHERE directorio = $i" ;
         if (! $this->db_1->getConn()->query($sql)){echo("Error description: " . $this->db_1->getConn() -> error);}
      }
      $this->db_1->DBexit();
   }

   if (count($difNuevosEnCatalogo) != 0 ){
      foreach ($difNuevosEnCatalogo as $j) {
         $this->datosCont($j);
      }
   }
}


protected function addDatosToFile(){
   $id = 1;
   foreach($this->ViajesEspacioArray as $ViajDir){
       $row = $this->datosCont($ViajDir);
       $V_x = new Viaje();
       $V_x->setid($id); 
       $V_x->setnombre($row[0]); 
       $V_x->setdirectorio($row[1]); 
       $V_x->setactivo($row[2]); 
       $V_x->setimgPagPrinc($row[3]); 
       $V_x->setaltPagPrinc($row[4]); 
       $V_x->setslider1($row[5]); 
       $V_x->setaltslider1($row[6]); 
       $V_x->setslider2($row[7]); 
       $V_x->setaltslider2($row[8]); 
       $V_x->setslider3($row[9]); 
       $V_x->setaltslider3($row[10]); 
       $V_x->settitulo($row[11]); 
       $V_x->setdescription($row[12]); 
       $V_x->setproveedor($row[13]); 
       $V_x->setpuerto($row[14]); 
       $V_x->setfechainicio($row[15]); 
       $V_x->setfechafin($row[16]); 
       $V_x->setpreparacion($row[17]); 
       $V_x->setplacas($row[18]); 
       $V_x->setprecio($row[19]) ;

       $this->arrayDeDatosDB->append($V_x);
       $id++;
   }
}


protected function datosCont($carpeta){
   $arrayDeDatos = array();
   $dir = opendir($carpeta);
      while($dirElem = readdir($dir)){
         $ft = $carpeta.'/'.$dirElem;
          if (is_file($ft)) { 
             $file = fopen($ft, 'r');
               
            while (! feof($file)){
                $line = fgets($file);
                if ($line[0] != '#'){
                  $datos = utf8_encode($line);
                  if (strlen($datos) > 0 ){
                     $subX = substr($datos,0,strpos($datos, ":"));
                     if ($subX == 'imgPagPrinc' || $subX == 'slider1' ||$subX == 'slider2' ||$subX == 'slider3'){
                        $subImag = explode(";", $line);
                        array_push($arrayDeDatos, str_replace(' ','',substr($subImag[0],strpos($subImag[0], ":")+1, strlen($subImag[0])))); 
                        array_push($arrayDeDatos, str_replace(' ','',substr($subImag[1],strpos($subImag[1], ":")+1, strlen($subImag[1]))));
                     }else{
                        array_push($arrayDeDatos, substr($datos,strpos($datos, ":")+1, strlen($datos)));
                     } 
                  }        
               }
            }
         }
      }
      array_splice($arrayDeDatos, 1, 0, [$carpeta, 1] );
      
      if ( ! $this->getErrorDB()) {$this->addToDB($arrayDeDatos);}
      else { return $arrayDeDatos;}
   }

protected function addToDB($arr){
   $sql='';
   for ($i = 0; $i < count($arr); $i++) {
      if ( $i != 2 && $i != 18 && $i != 19){$sql .= '"'.$arr[$i].'",' ;}
      elseif ( $i == 19){ $sql .= $arr[$i];}
      else { $sql .= $arr[$i] . ',';}
   }

   try{ $this->db_1->DBconn(); } 
   catch (Exception $e) {echo  $e->getMessage(); }
   $sqlTxt = "INSERT INTO Viajes (nombre, directorio, activo, imgPagPrinc, altPagPrinc, slider1, altslider1, slider2, altslider2, slider3, altslider3, titulo, description, proveedor, puerto, fechainicio, fechafin, preparacion, placas, precio) values( $sql)";
   if(! $this->db_1->getConn()->query($sqlTxt)){echo("Error description: " . $this->db_1->getConn() -> error);}  
   $this->db_1->DBexit();
}
   public function getErrorDB(){ return $this->errorDB;}
   public function setErrorDB( $bool_f ){ $this->errorDB = $bool_f;}
   public function getArrayDeDatos(){ return $this->arrayDeDatos;}
}
?>