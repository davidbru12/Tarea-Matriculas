<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículos EMT</title>
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
<h1>Vehículos EMT</h1>
<?php

// Variables
$matricula;
$direccion;
$fichero = fopen('vehiculosEMT.txt', 'r');
$escribir = fopen('vehiculosEMT.txt', 'a');

// Función para verificar si la matrícula está vacía
function esMatriculaVacia($matricula) {
    return empty($matricula);
}

// Función para verificar si la dirección está vacía
function esDireccionVacia($direccion) {
    return empty($direccion);
}

if (isset($_POST['enviar'])) {
    echo "<form action='vehiculosEMT.php' method='post'>";
    $matricula = $_POST['matricula'];
    $direccion = $_POST['direccion'];

    // Verificar si los campos no están vacíos
    if (!esMatriculaVacia($matricula) && !esDireccionVacia($direccion)) {
        // Si no están vacíos, escribir en el archivo
        if ($fichero && $escribir) {
            fwrite($escribir, "$matricula $direccion\n");
            // Mostrar los valores de matrícula y dirección en los campos del formulario
            echo " Matrícula: <input type='text' name='matricula' value='$matricula'><br>";
            echo "<br>Dirección: <input type='text' name='direccion' value='$direccion'><br>";
            echo "<br>";
            echo "<small style='color: green;'>Fichero escrito correctamente</small>";
            fclose($escribir);
            fclose($fichero);
        } else {
            echo "No se ha podido abrir el fichero para escribir";
        }
        
    } else {
        // Si alguno de los campos está vacío, mostrar el formulario con mensajes de error
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
            echo "<br>Dirección: <input type='text' name='direccion' value='$direccion'>";
        }
    }

    // Botón de envío del formulario
    echo "<br><br><input type='submit' name='enviar' value='Enviar'><br><br>";
    echo "</form>";
}
?>
</body>
</html>