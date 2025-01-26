<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taxis</title>
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
<h1>Taxis</h1>
<?php
// Variables
$matricula;
$nombre;
$fichero = fopen('taxis.txt', 'r');
$escribir = fopen('taxis.txt', 'a');

// Funcion para verificar si la matricula esta vacia
function esMatriculaVacia($matricula) {
    return empty($matricula);
}

// Funcion para verificar si el nombre esta vacio
function esNombreVacio($nombre) {
    return empty($nombre);
}

if (isset($_POST['enviar'])) {
    echo "<form action='taxis.php' method='post'>";
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];

    // Verificar si los campos no estan vacios
    if (!esMatriculaVacia($matricula) && !esNombreVacio($nombre)) {
        // Si no estan vacios, escribir en el archivo
        if ($fichero && $escribir) {
            fwrite($escribir, "$matricula $nombre\n");
            // Mostrar los valores de matricula y nombre en los campos del formulario
            echo " Matricula: <input type='text' name='matricula' value='$matricula'><br>";
            echo "<br>Nombre: <input type='text' name='nombre' value='$nombre'><br>";
            echo "<br>";
            echo "<small style='color: green;'>Fichero escrito correctamente</small>";
            fclose($escribir);
            fclose($fichero);
        } else {
            echo "No se ha podido abrir el fichero para escribir";
        }
        
    } else {
        // Si alguno de los campos esta vacio, mostrar el formulario con mensajes de error
        if (esMatriculaVacia($matricula)) {
            echo " Matricula: <input type='text' name='matricula'><br>";
            echo "<p style='color: red;'>La matricula no puede estar vacia.</p>";
        } else {
            echo " Matricula: <input type='text' name='matricula' value='$matricula'><br>";
        }

        if (esNombreVacio($nombre)) {
            echo "<br>Nombre: <input type='text' name='nombre'><br>";
            echo "<p style='color: red;'>El nombre no puede estar vacio.</p>";
        } else {
            echo "<br>Nombre: <input type='text' name='nombre' value='$nombre'>";
        }
    }

    // Boton de envio del formulario
    echo "<br><br><input type='submit' name='enviar' value='Enviar'><br><br>";
    echo "</form>";
}
?>
</body>
</html>