<?php
include ('conexion.php');

try {

//obtenemos el archivo .csv
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
                $letras = strlen($datos[$i]);
                echo $i . " " . $datos[$i] . " " . $letras;
                if (isset($letraspalabras[$letras])){
                    $letraspalabras[$letras] = $letraspalabras[$letras]+1;
                    //$palabras[$letras][] = $datos[$i];
                    if (isset($palabras[$letras][$datos[$i]])){
                        
                    }
                    echo " " . $letraspalabras[$letras] . "<br>";
                    //echo var_dump($letraspalabras) . "<br>";
                }else{
                    echo "el " . $letras . " no esta";
                    //$letraspalabras[$letras] = 1;
                    //array_push($letraspalabras, $letras);
                    $letraspalabras[$letras] = 1;
                    $palabras[$letras][$datos[$i]][] = 1;
                    echo " " . $letraspalabras[$letras] . "<br>";
                    //echo var_dump($letraspalabras) . "<br>";
                }
                $contadorLetras = $contadorLetras + $letras;
                $contadorPalabras ++;
            }
        }
    }
    echo  "<br>el archivo contiene " . $contadorPalabras . " palabras<br>";
    echo "ademas de contar con " . $contadorLetras . " letras<br><br>";
    echo var_dump($letraspalabras);
    echo "<br><br>";
    echo var_dump($palabras);
    //header("Location: ../public/resultados.php?cp=" . $contadorPalabras . "&cl=" . $contadorLetras . "&pl=" . serialize($letraspalabras) . "&palabras=" . serialize($palabras));
    //mysqli_query($con, "INSERT INTO `archivos` (`nombreArchivo`, `cantidadPalabras`, `CantidadLetras`, `conteoPalabras`) VALUES ('" . $archivotmp . "', '" . $contadorPalabras . "', '" . $contadorLetras . "', '" . $letraspalabras . "');");
}catch (Exception $e){
    echo "<script>alert('Algo ha pasado, verifica tu archivo'); window.location.href='../public/leer-archivo.php'</script>";
}