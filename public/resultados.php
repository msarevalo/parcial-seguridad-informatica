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
<body>
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
    //$llaves = array_keys($palabraletras);
    //echo var_dump($palabra);
    //echo "<br><br>";
}
?>
<div style="margin-left: 10px">
    <!--<label>Existen <?php
        /*echo $palabras
        ?> palabras en el archivo</label><br>
    <label>Existen <?php
        echo $letras
        ?> letras en el archivo</label><br><br>
    <label>Conteo por palabras <?php
        for ($i=1;$i<sizeof($llaves);$i++){
            $porcentaje = bcdiv(($palabraletras[$llaves[$i]]/$palabras)*100, '1', 2);
            echo "<br>" . $llaves[$i] . " " .  $palabraletras[$llaves[$i]] . " " . $porcentaje . "%<br>";
            $palabrallave = $palabra[$llaves[$i]];
            $palabrallaves = array_keys($palabrallave);
            //echo var_dump($palabrallave) . " " . $palabrallaves[0];
            for ($j=0;$j<sizeof($palabrallaves);$j++){
                echo $palabrallaves[$j] . " " . $palabrallave[$palabrallaves[$j]] . "<br>";
            }
        }
        //echo "<br><br><br>" . var_dump($palabraletras);*/
        ?></label>-->
    <div class="wrapper">
        <div class="col_fourth">
            <div class="hover panel">
                <div class="front">
                    <div class="box1">
                        <!--<p>Totalidad de Palabras</p><br>
                        <p><?php //echo $globalpalabras?></p>-->
                        <p>Palabras con: <?php
                        //for ($i=1;$i<sizeof($llaves);$i++){
                            $porcentaje = bcdiv(($palabraletras[$llaves[1]]/$palabras)*100, '1', 2);
                            echo " " . $llaves[1] . " letras<br><br>Cantidad de palabras: " .  $palabraletras[$llaves[1]] . "<br><br>" . $porcentaje . "%<br>";
                            $palabrallave = $palabra[$llaves[1]];
                            $palabrallaves = array_keys($palabrallave);
                            //echo var_dump($palabrallave) . " " . $palabrallaves[0];
                        //}
                            ?></p>
                    </div>
                </div>
                <div class="back">
                    <div class="box2">
                        <p><?php
                            for ($j=0;$j<sizeof($palabrallaves);$j++){
                                echo $palabrallaves[$j] . " " . $palabrallave[$palabrallaves[$j]] . "<br>";
                            }
                            ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="col_fourth">
            <div class="hover panel">
                <div class="front">
                    <div class="box1">
                        <!--<p>Totalidad de Palabras</p><br>
                        <p><?php //echo $globalpalabras?></p>-->
                        <p>Palabras con: <?php
                            //for ($i=1;$i<sizeof($llaves);$i++){
                            $porcentaje = bcdiv(($palabraletras[$llaves[2]]/$palabras)*100, '1', 2);
                            echo " " . $llaves[2] . " letras<br><br>Cantidad de palabras: " .  $palabraletras[$llaves[2]] . "<br><br>" . $porcentaje . "%<br>";
                            $palabrallave = $palabra[$llaves[2]];
                            $palabrallaves = array_keys($palabrallave);
                            //echo var_dump($palabrallave) . " " . $palabrallaves[0];
                            //}
                            ?></p>
                    </div>
                </div>
                <div class="back">
                    <div class="box2">
                        <p><?php
                            for ($j=0;$j<sizeof($palabrallaves);$j++){
                                echo $palabrallaves[$j] . " " . $palabrallave[$palabrallaves[$j]] . "<br>";
                            }
                            ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="col_fourth">
            <div class="hover panel">
                <div class="front">
                    <div class="box1">
                        <!--<p>Totalidad de Palabras</p><br>
                        <p><?php //echo $globalpalabras?></p>-->
                        <p>Palabras con: <?php
                            //for ($i=1;$i<sizeof($llaves);$i++){
                            $porcentaje = bcdiv(($palabraletras[$llaves[3]]/$palabras)*100, '1', 2);
                            echo " " . $llaves[3] . " letras<br><br>Cantidad de palabras: " .  $palabraletras[$llaves[3]] . "<br><br>" . $porcentaje . "%<br>";
                            $palabrallave = $palabra[$llaves[3]];
                            $palabrallaves = array_keys($palabrallave);
                            //echo var_dump($palabrallave) . " " . $palabrallaves[0];
                            //}
                            ?></p>
                    </div>
                </div>
                <div class="back">
                    <div class="box2">
                        <p><?php
                            for ($j=0;$j<sizeof($palabrallaves);$j++){
                                echo $palabrallaves[$j] . " " . $palabrallave[$palabrallaves[$j]] . "<br>";
                            }
                            ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="col_fourth end">
            <div class="hover panel">
                <div class="front">
                    <div class="box1">
                        <!--<p>Totalidad de Palabras</p><br>
                        <p><?php //echo $globalpalabras?></p>-->
                        <p>Palabras con: <?php
                            //for ($i=1;$i<sizeof($llaves);$i++){
                            $porcentaje = bcdiv(($palabraletras[$llaves[4]]/$palabras)*100, '1', 2);
                            echo " " . $llaves[4] . " letras<br><br>Cantidad de palabras: " .  $palabraletras[$llaves[4]] . "<br><br>" . $porcentaje . "%<br>";
                            $palabrallave = $palabra[$llaves[4]];
                            $palabrallaves = array_keys($palabrallave);
                            //echo var_dump($palabrallave) . " " . $palabrallaves[0];
                            //}
                            ?></p>
                    </div>
                </div>
                <div class="back">
                    <div class="box2">
                        <p><?php
                            for ($j=0;$j<sizeof($palabrallaves);$j++){
                                echo $palabrallaves[$j] . " " . $palabrallave[$palabrallaves[$j]] . "<br>";
                            }
                            ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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