<?php

    include("actualizar.php");
  
    function getViajes(){
    $cont = new Contenido();
    $ArrViajes = new ArrayObject();
 
    if ( ! $cont->getErrorDB()){
        $dbCon = new DB();
        try{ $dbCon->DBconn(); } 
        catch (Exception $e) {echo  $e->getMessage(); }

        if ($result = mysqli_query($dbCon->getConn(), "SELECT * FROM Viajes WHERE activo = 1")) { 
            while($row = mysqli_fetch_row($result)){
                $V_x = new Viaje();
                $V_x->setid($row[0]); 
                $V_x->setnombre($row[1]); 
                $V_x->setdirectorio($row[2]); 
                $V_x->setactivo($row[3]); 
                $V_x->setimgPagPrinc($row[4]); 
                $V_x->setaltPagPrinc($row[5]); 
                $V_x->setslider1($row[6]); 
                $V_x->setaltslider1($row[7]); 
                $V_x->setslider2($row[8]); 
                $V_x->setaltslider2($row[9]); 
                $V_x->setslider3($row[10]); 
                $V_x->setaltslider3($row[11]); 
                $V_x->settitulo($row[12]); 
                $V_x->setdescription($row[13]); 
                $V_x->setproveedor($row[14]); 
                $V_x->setpuerto($row[15]); 
                $V_x->setfechainicio($row[16]); 
                $V_x->setfechafin($row[17]); 
                $V_x->setpreparacion($row[18]); 
                $V_x->setplacas($row[19]); 
                $V_x->setprecio($row[20]) ;

                $ArrViajes->append($V_x);
            }
       mysqli_free_result($result);
        } else {echo("Error description: " . $dbCon->getConn()->error);}

        $dbCon->DBexit();
    }
    else{
        $cont = new Contenido();
        $ArrViajes = $cont->arrayDeDatosDB;

        }
    return $ArrViajes;
}


    ?>