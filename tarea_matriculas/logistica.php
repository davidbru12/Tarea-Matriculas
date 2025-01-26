<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículos de logística</title>
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
<h1>Vehículos de logística</h1>
<?php

// Variables
$matricula;
$empresa;
$fichero = fopen('logistica.txt', 'r');
$escribir = fopen('logistica.txt', 'a');

// Función para verificar si la matrícula está vacía
function esMatriculaVacia($matricula) {
    return empty($matricula);
}

// Función para verificar si la empresa está vacía
function esEmpresaVacia($empresa) {
    return empty($empresa);
}

if (isset($_POST['enviar'])) {
    echo "<form action='logistica.php' method='post'>";
    $matricula = $_POST['matricula'];
    $empresa = $_POST['empresa'];

    // Verificar si los campos no están vacíos
    if (!esMatriculaVacia($matricula) && !esEmpresaVacia($empresa)) {
        // Si no están vacíos, escribir en el archivo
        if ($fichero && $escribir) {
            fwrite($escribir, "$matricula $empresa\n");
            // Mostrar los valores de matrícula y empresa en los campos del formulario
            echo " Matrícula: <input type='text' name='matricula' value='$matricula'><br>";
            echo "<br>Empresa: <input type='text' name='empresa' value='$empresa'><br>";
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

        if (esEmpresaVacia($empresa)) {
            echo "<br>Empresa: <input type='text' name='empresa'><br>";
            echo "<p style='color: red;'>La empresa no puede estar vacía.</p>";
        } else {
            echo "<br>Empresa: <input type='text' name='empresa' value='$empresa'>";
        }
    }

    // Botón de envío del formulario
    echo "<br><br><input type='submit' name='enviar' value='Enviar'><br><br>";
    echo "</form>";
}
?>

</body>
</html>