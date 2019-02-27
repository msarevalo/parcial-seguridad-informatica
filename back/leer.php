<?php
include ('conexion.php');

try {
//obtenemos el archivo .txt
    $tipo = $_FILES['archivo']['type'];

    $tamanio = $_FILES['archivo']['size'];

    $archivotmp = $_FILES['archivo']['tmp_name'];

    $archivo = file($archivotmp);
    //echo $tipo;
    $contadorPalabras = 0;
    $contadorLetras = 0;
    $letraspalabras[] = 0;
    $palabras[][][] = 0;
    if ($tipo==="text/plain"){
        foreach ($archivo as $ar => $archi) {
            //echo $achi . "<br>";
            $datos = explode(" ", $archi);
            $datos = str_replace(array("\\", "¨", "º", "-", "~", "#", "@", "|", "!", "\"", "·", "$", "%", "&", "/", "(", ")", "?", "'", "¡", "¿", "[", "^", "<code>", "]", "+", "}", "{", "¨", "´", ">", "< ", ";", ",", ":", ".", "\n", "\r"),'', $datos);
            for ($i = 0;$i < sizeof($datos);$i++){
                $datos[$i] = eliminar_tildes($datos[$i]);
                $letras = strlen($datos[$i]);
                //echo $i . " " . $datos[$i] . " " . $letras;
                if (isset($letraspalabras[$letras])){
                    $letraspalabras[$letras] = $letraspalabras[$letras]+1;
                    //$palabras[$letras][] = $datos[$i];
                    if (isset($palabras[$letras][$datos[$i]])){
                        $palabras[$letras][$datos[$i]] = $palabras[$letras][$datos[$i]]+1;
                    }else{
                        $palabras[$letras][$datos[$i]] = 1;
                    }
                    //echo " " . $letraspalabras[$letras] . "<br>";
                    //echo var_dump($letraspalabras) . "<br>";
                }else{
                    //echo "el " . $letras . " no esta";
                    //$letraspalabras[$letras] = 1;
                    //array_push($letraspalabras, $letras);
                    $letraspalabras[$letras] = 1;
                    $palabras[$letras][$datos[$i]] = 1;
                    //echo " " . $letraspalabras[$letras] . "<br>";
                    //echo var_dump($letraspalabras) . "<br>";
                }
                $contadorLetras = $contadorLetras + $letras;
                $contadorPalabras ++;
            }
        }
    }
    //echo  "<br>el archivo contiene " . $contadorPalabras . " palabras<br>";
    //echo "ademas de contar con " . $contadorLetras . " letras<br><br>";
    //echo var_dump($letraspalabras);
    //echo "<br><br>";
    //echo var_dump($palabras);
    header("Location: ../public/resultados.php?cp=" . $contadorPalabras . "&cl=" . $contadorLetras . "&pl=" . serialize($letraspalabras) . "&palabras=" . serialize($palabras));
    //mysqli_query($con, "INSERT INTO `archivos` (`nombreArchivo`, `cantidadPalabras`, `CantidadLetras`, `conteoPalabras`) VALUES ('" . $archivotmp . "', '" . $contadorPalabras . "', '" . $contadorLetras . "', '" . $letraspalabras . "');");
}catch (Exception $e){
    echo "<script>alert('Algo ha pasado, verifica tu archivo'); window.location.href='../public/leer-archivo.php'</script>";
}
function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = (string)$cadena;
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}

function eliminar_tildes($cadena){

    //Codificamos la cadena en formato utf8 en caso de que nos de errores
    $cadena = utf8_encode($cadena);

    //Ahora reemplazamos las letras
    $cadena = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $cadena
    );

    $cadena = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $cadena );

    $cadena = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $cadena );

    $cadena = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $cadena );

    $cadena = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $cadena );

    $cadena = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C'),
        $cadena
    );

    $cadena = str_replace(
        array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'),
        array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'),
        $cadena
    );



    return $cadena;
}
$palabras = $contadorPalabras;
$letras = $contadorLetras;
$palabraletras = $letraspalabras;
$palabra = $palabras;
$llaves = array_keys($palabraletras);
?>
<div style="margin-left: 350px">
    <label>Existen <?php
        echo $palabras
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
        //echo "<br><br><br>" . var_dump($palabraletras);
        ?></label>
</div>
</body>
</html>
