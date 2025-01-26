<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infractores</title>
    <style>
        body {
            text-align: center;
            border: 1px solid black;
            margin-top: 10%;
            margin-left: 25%;
            margin-right: 25%;
            margin-bottom: 10%;
        }
    </style>
</head>
<body>
    <h1>Infractores</h1>
    <?php
        $ficheroVehiculos = fopen("vehiculos.txt", "r");
        $ficheroResidentes = fopen("residentesYHoteles.txt", "r");
        $ficheroLogistica = fopen("logistica.txt", "r");
        $ficheroVehiculosEMT = fopen("vehiculosEMT.txt", "r");
        $ficheroTaxis = fopen("taxis.txt", "r");
        $ficheroServicios = fopen("servicios.txt", "r");
        

        function buscaMatricula($ficheroVehiculosParam, $ficheroParam){
            rewind($ficheroParam);
            while (($lineaFicheros = fgets($ficheroParam)) !== false) {
                $lineaFicheros = trim(substr($lineaFicheros, 0, 8));
                if ($lineaFicheros == $ficheroVehiculosParam) {
                    return true;
                }
            }
            return false;
        }

    if ($ficheroVehiculos && $ficheroResidentes && $ficheroLogistica &&
        $ficheroVehiculosEMT && $ficheroTaxis && $ficheroServicios) {

        // Leer el archivo de vehículos línea por línea
        while (($lineaFicherosVehiculos = fgets($ficheroVehiculos)) !== false && $linea = fgets($ficheroVehiculos)) {
            $lineaFicherosVehiculos = trim($lineaFicherosVehiculos);  // Eliminar espacios extra y saltos de línea
            $matricula = substr($lineaFicherosVehiculos, 0, 8);
            
            // Comprobar si la matrícula está en alguno de los archivos
            $interruptor = false;  // Inicializar a false en cada iteración
            
            if (stripos($lineaFicherosVehiculos, "eléctrico") !== false) {
                $interruptor = true;
            }
            if (buscaMatricula($matricula, $ficheroResidentes) ||
                buscaMatricula($matricula, $ficheroServicios) ||
                buscaMatricula($matricula, $ficheroTaxis) ||
                buscaMatricula($matricula, $ficheroVehiculosEMT) ||
                buscaMatricula($matricula, $ficheroLogistica)) {
                $interruptor = true;  // Si se encuentra en cualquier archivo, marca como true
            }

            // Si la matrícula no se encuentra en ninguno de los archivos, es un infractor
            if (!$interruptor) {
                echo "Infractor: $lineaFicherosVehiculos";
                echo "<br><br>";
            }
        }

        // Enlace para volver a la página inicial
        echo "<br><br>";
        echo "<a href='index.html'>Volver</a><br><br>";

    } else {
        die("ERROR: No se ha podido abrir uno de los ficheros de datos.");
    }
?>
</body>
</html>