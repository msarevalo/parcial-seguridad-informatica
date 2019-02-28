<!DOCTYPE html>
<html>
<head>
    <title>Parcial | Seguridad Informatica</title>
    <meta charset="UTF-8">
    <!-- Estilos -->
    <link href="../css/estilos.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/script.js" type="application/javascript"></script>
</head>
<body onload="noVolver()">
<?php
include ('../back/conexion.php');

if (isset($_GET['name'])){
    $nombre = $_GET['name'];
}
if (isset($_GET['gp'])){
    $globalpalabras = $_GET['gp'];
}
if (isset($_GET['gl'])){
    $globalletras = $_GET['gl'];
}
if (isset($_GET['cp'])){
    $palabras = $_GET['cp'];
}
if (isset($_GET['cl'])){
    $letras = $_GET['cl'];
}
if (isset($_GET['pl'])){
    $palabraletras = $_GET['pl'];
    $palabraletras = unserialize($palabraletras);
    $llaves = array_keys($palabraletras);
}
if (isset($_GET['palabras'])){
    $palabra = $_GET['palabras'];
    $palabra = unserialize($palabra);
    if (!$palabra){
        echo "<a href=\"leer-archivo.php\"><img src=\"../img/return.png\" width=\"35px\"></a>";
        echo "<br><br><label>Lo sentimos no pudimos leer el archivo pues es muy largo</label>";
        exit();
    }
    //$llaves = array_keys($palabraletras);
    //echo var_dump($palabra);
    //echo "<br><br>";
}
?>
<div>
    <a href="leer-archivo.php"><img src="../img/return.png" width="35px"></a>
    <?php

    for ($i=1;$i<sizeof($llaves);$i++){
        $porcentaje = bcdiv(($palabraletras[$llaves[1]] / $palabras) * 100, '1', 2);
        if (!$i==sizeof($llaves)-1){
    ?>

    <div class="wrapper">
        <div class="col_fourth">
            <div class="hover panel">
                <div class="front">
                    <div class="box1">
                       <?php //echo $globalpalabras
                        ?>
                        <p>Palabras con:<br><?php
                            //for ($i=1;$i<sizeof($llaves);$i++){
                            $porcentaje = bcdiv(($palabraletras[$llaves[$i]] / $palabras) * 100, '1', 2);
                            echo " " . $llaves[$i] . " letras<br><br>Cantidad de palabras: " . $palabraletras[$llaves[$i]] . "<br><br>" . $porcentaje . "%<br>";
                            $palabrallave = $palabra[$llaves[$i]];
                            $palabrallaves = array_keys($palabrallave);
                            //echo var_dump($palabrallave) . " " . $palabrallaves[0];
                            //}
                            ?></p>
                    </div>
                </div>
                <div class="back">
                    <div class="box2">
                        <p><?php
                            for ($j = 0; $j < sizeof($palabrallaves); $j++) {
                                echo $palabrallaves[$j] . " " . $palabrallave[$palabrallaves[$j]] . "<br><br>";
                            }
                            ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }else{
        ?>
    <div class="wrapper">
        <div class="col_fourth end">
            <div class="hover panel">
                <div class="front">
                    <div class="box1">
                        <?php //echo $globalpalabras
                        ?>
                        <p>Palabras con:<br><?php
                            //for ($i=1;$i<sizeof($llaves);$i++){
                            $porcentaje = bcdiv(($palabraletras[$llaves[$i]] / $palabras) * 100, '1', 2);
                            echo " " . $llaves[$i] . " letras<br><br>Cantidad de palabras: " . $palabraletras[$llaves[$i]] . "<br><br>" . $porcentaje . "%<br>";
                            $palabrallave = $palabra[$llaves[$i]];
                            $palabrallaves = array_keys($palabrallave);
                            //echo var_dump($palabrallave) . " " . $palabrallaves[0];
                            //}
                            ?></p>
                    </div>
                </div>
                <div class="back">
                    <div class="box2">
                        <p><?php
                            for ($j = 0; $j < sizeof($palabrallaves); $j++) {
                                $por = (bcdiv(($palabrallave[$palabrallaves[$j]]/$palabraletras[$llaves[$i]])*100, '1', 2));
                                $globalpor = (bcdiv(($palabrallave[$palabrallaves[$j]]/$globalpalabras)*100, '1', 2));
                                echo "<strong style='color: #005e6e'>" . $palabrallaves[$j] . ":</strong><br>" . $palabrallave[$palabrallaves[$j]] . "/" . $palabraletras[$llaves[$i]] . " " . $por . "%<br>";
                                echo $palabrallave[$palabrallaves[$j]] . "/" . $globalpalabras . " " . $globalpor . "%<br><br>";
                            }
                            ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    }
    ?>
    <script>
        $(document).ready(function(){
            // set up hover panels
            // although this can be done without JavaScript, we've attached these events
            // because it causes the hover to be triggered when the element is tapped on a touch device
            $('.hover').hover(function(){
                $(this).addClass('flip');
            },function(){
                $(this).removeClass('flip');
            });
        });
    </script>
</div>
</body>
</html>