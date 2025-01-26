<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
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
<h1>Servicios</h1>
<?php
// Variables
$matricula;
$servicio;
$fichero = fopen('servicios.txt', 'r');
$escribir = fopen('servicios.txt', 'a');

// Función para verificar si la matrícula está vacía
function esMatriculaVacia($matricula) {
    return empty($matricula);
}

// Función para verificar si el servicio está vacío
function esServicioVacio($servicio) {
    return empty($servicio);
}

if (isset($_POST['enviar'])) {
    echo "<form action='servicios.php' method='post'>";
    $matricula = $_POST['matricula'];
    $servicio = $_POST['servicio'];

    // Verificar si los campos no están vacíos
    if (!esMatriculaVacia($matricula) && !esServicioVacio($servicio)) {
        // Si no están vacíos, escribir en el archivo
        if ($fichero && $escribir) {
            fwrite($escribir, "$matricula $servicio\n");
            // Mostrar los valores de matrícula y servicio en los campos del formulario
            echo " Matricula: <input type='text' name='matricula' value='$matricula'><br>";
            echo "<br>Servicio: <input type='text' name='servicio' value='$servicio'><br>";
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
            echo " Matricula: <input type='text' name='matricula'><br>";
            echo "<p style='color: red;'>La matricula no puede estar vacia.</p>";
        } else {
            echo " Matricula: <input type='text' name='matricula' value='$matricula'><br>";
        }

        if (esServicioVacio($servicio)) {
            echo "<br>Servicio: <input type='text' name='servicio'><br>";
            echo "<p style='color: red;'>El servicio no puede estar vacio.</p>";
        } else {
            echo "<br>Servicio: <input type='text' name='servicio' value='$servicio'>";
        }
    }

    // Botón de envío del formulario
    echo "<br><br><input type='submit' name='enviar' value='Enviar'><br><br>";
    echo "</form>";
}
?>
</body>
</html>