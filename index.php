<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/app.js"></script>
    <title>Document</title>
</head>
<body>
    <main>
        <header>
            <div id="imagG">
                <h1 id="logo1">Observar Universo</h1>
                <h2 id="logo2">TURISMO ESPACIAL</h2>
            </div>         
        </header>

        <section id="s_1">
            <div id="A_123">
            <section class="auto-slider">
                <div id="slider">
                    <figure>
                        <img id="img1" alt="">
                        <img id="img2" alt="">
                        <img id="img3" alt="">
                    </figure>
                </div>
            </section>
            <div id="A_123desc"></div>
            </div>
            <?php
                include('control.php');
                function creaWin(){ echo '<p style="color:red">creando Win</p>';}
                echo '<div class="container">';
                echo '<div class="row">';
                foreach(getViajes() as $viaje){
                    $dir =   $viaje->getdirectorio() . '/img/' . $viaje->getimgPagPrinc();
                    $id = 'v_'.$viaje->getid();
                    $datosViaje = $id.'~#'.$viaje->getdirectorio().'~#'. $viaje->getslider1().'~#'. $viaje->getaltslider1().
                    '~#'.$viaje->getslider2().'~#'. $viaje->getaltslider2().'~#'.$viaje->getslider3().'~#'. $viaje->getaltslider3().
                    '~#'.$viaje->getdescription().'~#'. $viaje->getproveedor().'~#'. $viaje->getpuerto().'~#'. $viaje->getfechainicio().
                    '~#'.$viaje->getfechafin().'~#'. $viaje->getpreparacion().'~#'. $viaje->getplacas().'~#'. $viaje->getprecio();
                    echo '<div class="col">';
                    echo '<div class="window_A" id="'.$id.'">';
                    echo "<img style='padding: 12.5px' src =$dir alt = ".$viaje->getaltPagPrinc().">";
                    echo "<h3>".$viaje->gettitulo()."</h3>";
                    echo "<p class='proveedor'>".$viaje->getproveedor()."</p>";
                    echo "<p class='precio'>".$viaje->getprecio()." / pers.</p>";
                    echo "<span class='datosEscondidos'>$datosViaje</span>";
                    echo "<script>recopilarDatos()</script>";
                    echo '</div></div>';
                
            } 
                echo '</div></div>';
                echo "<script>procesarDatos()</script>";
            ?>
        </section>
        <footer>
        </footer>
    </main>
</body>

<?php
include('control.php');
var_dump(getViajes());
?>

</body>
</html>