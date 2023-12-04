<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = "localhost";
$user = "root";
$passw = "";
$db_name = "bbddrkmusic";

$tabladvds = "tdrkdvds";

$conexion = new mysqli($server, $user, $passw, $db_name);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

if (isset($_POST['estilo'])) {
    $estilo = $_POST['estilo'];
    $orden = $_POST['orden'];

    $sql = "SELECT * FROM $tabladvds WHERE EstiloMusicalDVD LIKE '%$estilo%' ORDER BY NombreDVD";
    $result = $conexion->query($sql);
    if ($result->num_rows > 0) {
        echo "<table class='tabla'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Artista</th><th>Estilo Musical</th><th>Año</th><th>Número de Canciones</th><th>Títulos de Canciones</th><th>Cantidad</th><th>Precio</th><th>Descuento</th><th>IVA</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['ID_DVD'] . "</td>";
            echo "<td>" . $row['NombreDVD'] . "</td>";
            echo "<td>" . $row['ArtistaDVD'] . "</td>";
            echo "<td>" . $row['EstiloMusicalDVD'] . "</td>";
            echo "<td>" . $row['AñoDVD'] . "</td>";
            echo "<td>" . $row['NumeroCancionesDVD'] . "</td>";
            echo "<td>" . $row['TitulosCancionesDVD'] . "</td>";
            echo "<td>" . $row['CantidadDVD'] . "</td>";
            echo "<td>" . $row['PrecioDVD'] . "</td>";
            echo "<td>" . $row['DescuentoDVD'] . "</td>";
            echo "<td>" . $row['IVADVD'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron resultados.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar DVDs</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        table {
            background-color: #f2f2f2;
            border-collapse: collapse;
            width: 100%;
            font-size: 20px; /* Aumenta el tamaño de fuente de la tabla */
        }

        th, td {
            padding: 16px; /* Aumenta el padding de las celdas */
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body class="grid-container">
    <header>
        <h1 class="titulo">Buscar DVDs</h1>

        <ul>
            <a href="index.php"><li>Inicio</li></a>
            <li>Acciones
                <ul>
                    <li><a href="Alta.php">Altas</a></li>
                    <li><a href="bajas.php">Bajas</a></li>
                    <li><a href="#">Modificar</a></li>
                </ul>
            </li>
            <li>Consultas
                <ul>
                <li><a href="tdr.php">Todos Los registros</a></li>
          <li><a href="bur.php">Buscar un registro</a></li>
          <li><a href="bco.php">Buscar con orden</a></li>
          <li><a href="bro.php">Buscar registro ordenado</a></li>
          <li><a href="boyl.php">Buscar registro ordenado y limitado</a></li>
                </ul>
            </li>
        </ul>

    </header>
    <main>
        <form action="" method="POST">
            <label for="estilo">Buscar por estilo musical:</label>
            <input type="text" name="estilo" id="estilo" required>
            <label for="orden">Ordenar por:</label>
            <select name="orden" id="orden">
                <option value="NombreDVD">Nombre</option>
                <option value="ArtistaDVD">Artista</option>
                <option value="AñoDVD">Año</option>
                <option value="PrecioDVD">Precio</option>
            </select>
            <input type="submit" value="Buscar">
        </form>
    </main>
</body>

</html>
