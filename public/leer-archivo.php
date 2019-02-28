<!DOCTYPE html>
<html>
<head>
    <title>Parcial | Seguridad Informatica</title>
    <meta charset="UTF-8">
    <!-- Estilos -->
    <link href="../css/estilos.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/scripts.js" type="application/javascript"></script>
</head>
<body onload="noVolver()" style="text-align: center;">
<?php
include ('../back/conexion.php');
?>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-body">
            <form name="form1" id="form1" method="post" action="../back/leer.php" enctype="multipart/form-data">
                <h4 class="text-center">Cargar Archivo TXT</h4>
                <div class="form-group">
                    <div class="col-sm-8">
                        <input type="file" id="archivo" class="input-file-html5" name="archivo" accept=".txt" required>
                    </div><br>
                    <button type="submit" class="btn w-M br-0 stl-3">Cargar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>