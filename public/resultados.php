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
    echo var_dump($palabra);
    echo "<br><br>";
}
?>
<div style="margin-left: 350px">
    <label>Existen <?php
        echo $palabras
        ?> palabras en el archivo</label><br>
    <label>Existen <?php
        echo $letras
        ?> letras en el archivo</label><br>
    <label>Conteo por palabras <?php
        for ($i=1;$i<sizeof($llaves);$i++){
            $porcentaje = bcdiv(($palabraletras[$llaves[$i]]/$palabras)*100, '1', 2);
            echo "<br>" . $llaves[$i] . " " .  $palabraletras[$llaves[$i]] . " " . $porcentaje . "%<br>";

        }
        //echo "<br><br><br>" . var_dump($palabraletras);
        ?></label>
</div>
</body>
</html>