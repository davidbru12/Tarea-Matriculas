<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículos residentes/hoteles</title>
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
<h1>Vehículos residentes/hoteles</h1>
<?php

// Variables
$matricula;
$direccion;
$fecha_inicio;
$fecha_final;
$fichero = fopen('residentesYHoteles.txt', 'r');
$escribir = fopen('residentesYHoteles.txt', 'a');

// Función para verificar si la matrícula está vacía
function esMatriculaVacia($matricula) {
    return empty($matricula);
}

// Función para verificar si la dirección está vacía
function esDireccionVacia($direccion) {
    return empty($direccion);
}

// Función para verificar si la fecha es válida (formato dd/mm/yyyy)
function esFechaValida($fecha) {
    // Verificar el formato dd/mm/yyyy
    $partes = explode('/', $fecha);
    return count($partes) === 3 && checkdate($partes[1], $partes[0], $partes[2]);
}

if (isset($_POST['enviar'])) {
    echo "<form action='residentesYHoteles.php' method='post'>";
    $matricula = $_POST['matricula'];
    $direccion = $_POST['direccion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];

    // Verificar si los campos no están vacíos
    if (!esMatriculaVacia($matricula) && !esDireccionVacia($direccion) && esFechaValida($fecha_inicio) && esFechaValida($fecha_final)) {
        // Si no están vacíos, escribir en el archivo
        if ($fichero && $escribir) {
            fwrite($escribir, "$matricula $direccion $fecha_inicio $fecha_final\n");
            // Mostrar los valores en los campos del formulario
            echo " Matrícula: <input type='text' name='matricula' value='$matricula'><br>";
            echo "<br>Dirección: <input type='text' name='direccion' value='$direccion'><br>";
            echo "<br>Fecha de inicio: <input type='text' name='fecha_inicio' value='$fecha_inicio'><br>";
            echo "<br>Fecha de finalización: <input type='text' name='fecha_final' value='$fecha_final'><br>";
            echo "<br>";
            echo "<small style='color: green;'>Fichero escrito correctamente</small>";
            fclose($escribir);
            fclose($fichero);
        } else {
            echo "No se ha podido abrir el fichero para escribir";
        }
        
    } else {
        // Si alguno de los campos está vacío o las fechas no son válidas, mostrar el formulario con mensajes de error
        if (esMatriculaVacia($matricula)) {
            echo " Matrícula: <input type='text' name='matricula'><br>";
            echo "<p style='color: red;'>La matrícula no puede estar vacía.</p>";
        } else {
            echo " Matrícula: <input type='text' name='matricula' value='$matricula'><br>";
        }

        if (esDireccionVacia($direccion)) {
            echo "<br>Dirección: <input type='text' name='direccion'><br>";
            echo "<p style='color: red;'>La dirección no puede estar vacía.</p>";
        } else {
            echo "<br>Dirección: <input type='text' name='direccion' value='$direccion'><br>";
        }
        if ($fecha_inicio == null || $fecha_inicio == ' '){
            echo "<br>Fecha de inicio: <input type='text' name='fecha_inicio'><br>";
            echo "<p style='color: red;'>La fecha de inicio no puede estar vacia.</p>";
        }else {
            if (!esFechaValida($fecha_inicio)) {
                echo "<br>Fecha de inicio: <input type='text' name='fecha_inicio'><br>";
                echo "<p style='color: red;'>La fecha de inicio no es válida. El formato debe ser dd/mm/yyyy.</p>";
            } else {
                echo "<br>Fecha de inicio: <input type='text' name='fecha_inicio' value='$fecha_inicio'><br>";
            }
        }
        
        if($fecha_final == null || $fecha_final ==' '){
            echo "<br>Fecha de finalización: <input type='text' name='fecha_final'><br>";
            echo "<p style='color: red;'>La fecha final no puede estar vacia.</p>";
        }else{
            if (!esFechaValida($fecha_final)) {
                echo "<br>Fecha de finalización: <input type='text' name='fecha_final'><br>";
                echo "<p style='color: red;'>La fecha final no es válida. El formato debe ser dd/mm/yyyy.</p>";
            } else {
                echo "<br>Fecha de finalización: <input type='text' name='fecha_final' value='$fecha_final'><br>";
            }
        }
        
    }

    // Botón de envío del formulario
    echo "<br><br><input type='submit' name='enviar' value='Enviar'><br><br>";
    echo "</form>";
}
?>

</body>
</html>