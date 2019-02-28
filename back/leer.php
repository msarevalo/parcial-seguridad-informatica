<?php
include ('conexion.php');

try {
//obtenemos el archivo .txt
    $tipo = $_FILES['archivo']['type'];

    $tamanio = $_FILES['archivo']['size'];

    $archivotmp = $_FILES['archivo']['tmp_name'];

    $nombrearchivo = $_FILES['archivo']['name'];

    $archivo = file($archivotmp);
    //echo $tipo;
    $contadorPalabras = 0;
    $contadorLetras = 0;
    $contadorPalabras1 = 0;
    $contadorLetras1 = 0;
    $letraspalabras[] = 0;
    $palabras[][][] = 0;
    if ($tipo==="text/plain"){
        foreach ($archivo as $ar => $archi) {
            //echo $achi . "<br>";
            $datos = explode(" ", $archi);
            $datos = str_replace(array("\\", "¨", "º", "-", "~", "#", "@", "|", "!", "\"", "·", "$", "%", "&", "/", "(", ")", "?", "'", "¡", "¿", "[", "^", "<code>", "]", "+", "}", "{", "¨", "´", ">", "< ", ";", ",", ":", ".", "\n", "\r", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0"),'', $datos);
            for ($i = 0;$i < sizeof($datos);$i++) {
                $datos[$i] = eliminar_tildes($datos[$i]);
                $letras = strlen($datos[$i]);
                //echo $i . " " . $datos[$i] . " " . $letras;
                if ($letras <= 4 && $letras >= 1) {
                    $contadorPalabras++;
                    if (isset($letraspalabras[$letras])) {
                        $letraspalabras[$letras] = $letraspalabras[$letras] + 1;
                        //$palabras[$letras][] = $datos[$i];
                        if (isset($palabras[$letras][$datos[$i]])) {
                            $palabras[$letras][$datos[$i]] = $palabras[$letras][$datos[$i]] + 1;
                        } else {
                            $palabras[$letras][$datos[$i]] = 1;
                        }
                        //echo " " . $letraspalabras[$letras] . "<br>";
                        //echo var_dump($letraspalabras) . "<br>";
                    } else {
                        //echo "el " . $letras . " no esta";
                        //$letraspalabras[$letras] = 1;
                        //array_push($letraspalabras, $letras);
                        $letraspalabras[$letras] = 1;
                        $palabras[$letras][$datos[$i]] = 1;
                        //echo " " . $letraspalabras[$letras] . "<br>";
                        //echo var_dump($letraspalabras) . "<br>";
                    }
                    $contadorLetras = $contadorLetras + $letras;

                }
                $contadorLetras1 = $contadorLetras1 + $letras;
                $contadorPalabras1++;
            }
        }
    }
    header("Location: ../public/resultados.php?name=" . $nombrearchivo . "&gp=" . $contadorPalabras1 . "&gl=" . $contadorLetras1 ."&cp=" . $contadorPalabras . "&cl=" . $contadorLetras . "&pl=" . serialize($letraspalabras) . "&palabras=" . serialize($palabras));
    ?>
<!--<div>
    <a href="leer-archivo.php"><img src="../img/return.png" width="35px"></a>
    <?php
    //name=" . $nombrearchivo . "&gp=" . $contadorPalabras1 . "&gl=" . $contadorLetras1 ."&cp=" . $contadorPalabras . "&cl=" . $contadorLetras . "&pl=" . serialize($letraspalabras) . "&palabras=" . serialize($palabras));
    /*$nombre = $nombrearchivo;
    $globalpalabras = $contadorPalabras1;
    $globalletras = $contadorLetras1;
    $palabras = $contadorPalabras;
    $letras = $contadorLetras;
    $palabraletras = $letraspalabras;
    $llaves = array_keys($palabraletras);
    $palabra = $palabras;
    for ($i=1;$i<sizeof($llaves);$i++){
        $porcentaje = bcdiv(($palabraletras[$llaves[1]] / $palabras) * 100, '1', 2);

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
<?php
    /*echo  "<br>el archivo contiene " . $contadorPalabras . " palabras<br>";
    echo "ademas de contar con " . $contadorLetras . " letras<br><br>";
    echo  "<br>el archivo contiene " . $contadorPalabras1 . " palabras<br>";
    echo "ademas de contar con " . $contadorLetras1 . " letras<br><br>";
    echo var_dump($letraspalabras);
    echo "<br><br>";
    echo var_dump($palabras);*/
    //header("Location: ../public/resultados.php?name=" . $nombrearchivo . "&gp=" . $contadorPalabras1 . "&gl=" . $contadorLetras1 ."&cp=" . $contadorPalabras . "&cl=" . $contadorLetras . "&pl=" . serialize($letraspalabras) . "&palabras=" . serialize($palabras));
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