<?php
require 'vendor/autoload.php';
require_once("conexion.php");
$db = new Database();
$conectar = $db->conectar();

use Picqer\Barcode\BarcodeGeneratorPNG;



if ((isset($_POST["registro"])) && ($_POST["registro"] == "formu")) {
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    $codigo_barras = uniqid() . rand(1000, 9999);

    $generator = new BarcodeGeneratorPNG();

    $codigo_barras_imagen = $generator->getBarcode($codigo_barras, $generator::TYPE_CODE_128);

    file_put_contents(__DIR__ . '/images/' . $codigo_barras . '.png', $codigo_barras_imagen);

    $insertsql = $conectar->prepare("INSERT INTO personas(documento, nombre, correo, codigo_barras) VALUES (?, ?, ?, ?)");
    $insertsql->execute([$documento, $nombre, $correo, $codigo_barras]);
}

    // Consultar la base de datos para obtener los datos de las personas registradas
    $usua = $conectar->prepare("SELECT * FROM personas");
    $usua->execute();
    $asigna = $usua->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Personas</title>
    <link rel="stylesheet" type="text/css" href="css/registro.css">
</head>
<body>

<main class="contenedor">
    <div class="formulario sombra">
        <h2>Crear Persona</h2>
        <form method="POST" action="registro.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="documento">Documento:</label>
                <input type="text" class="form-control" id="documento" name="documento" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre completo:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="text" class="form-control" id="correo" name="correo" required>
            </div>
                
            <div class="btn-container">
                <input type="submit" class="btn btn-success" value="Crear Persona">
            </div>
            <input type="hidden" name="registro" value="formu">
        </form>
    </div>

    <div class="tabla mt-3">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Codigo de barras</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($asigna as $usua) { ?>
                <tr>
                    <td><?= $usua["documento"] ?></td>
                    <td><?= $usua["nombre"] ?></td>
                    <td><?= $usua["correo"] ?></td>
                    <td><img src="images/<?= $usua["codigo_barras"] ?>.png" style="max-width: 100px;"></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>
    
</body>
</html>