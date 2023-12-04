<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body class="grid-container">
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    // Aqui hacemos la conexion a la base de datos
    $server = "localhost";
    $user = "root";
    $passw = "";
    $db_name = "bbddrkmusic";
    // aqui van las tablas que vamos a crear
    $tabladvds = "tdrkdvds";
    $tablaventas = "tdrkventas";

    $conexion = new mysqli($server, $user, $passw, $db_name);

    if ($conexion->connect_error) {
        die("Error en la conexion: " . $conexion->connect_error);
    }

    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $sql = "SELECT * FROM $tabladvds WHERE NombreDVD = '$nombre'";
        $result = $conexion->query($sql);
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Artista</th><th>Estilo Musical</th><th>Año</th><th>Número de Canciones</th><th>Títulos de Canciones</th><th>Cantidad</th><th>Precio</th><th>Descuento</th><th>IVA</th><th>Modificar</th></tr>";
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
                echo "<td><a href='modificar_registro.php?id=" . $row['ID_DVD'] . "'>Modificar</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    } elseif (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM $tabladvds WHERE ID_DVD = '$id'";
        $result = $conexion->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Display the form with the existing data for modification
            echo "<form action='actualizar_registro.php' method='POST'>";
            echo "<label for='nombre'>Nombre:</label>";
            echo "<input type='text' name='nombre' id='nombre' value='" . $row['NombreDVD'] . "' required><br>";
            echo "<label for='artista'>Artista:</label>";
            echo "<input type='text' name='artista' id='artista' value='" . $row['ArtistaDVD'] . "' required><br>";
            echo "<label for='estilo'>Estilo Musical:</label>";
            echo "<input type='text' name='estilo' id='estilo' value='" . $row['EstiloMusicalDVD'] . "' required><br>";
            echo "<label for='ano'>Año:</label>";
            echo "<input type='text' name='ano' id='ano' value='" . $row['AñoDVD'] . "' required><br>";
            echo "<label for='num_canciones'>Número de Canciones:</label>";
            echo "<input type='text' name='num_canciones' id='num_canciones' value='" . $row['NumeroCancionesDVD'] . "' required><br>";
            echo "<label for='titulos_canciones'>Títulos de Canciones:</label>";
            echo "<input type='text' name='titulos_canciones' id='titulos_canciones' value='" . $row['TitulosCancionesDVD'] . "' required><br>";
            echo "<label for='cantidad'>Cantidad:</label>";
            echo "<input type='text' name='cantidad' id='cantidad' value='" . $row['CantidadDVD'] . "' required><br>";
            echo "<label for='precio'>Precio:</label>";
            echo "<input type='text' name='precio' id='precio' value='" . $row['PrecioDVD'] . "' required><br>";
            echo "<label for='descuento'>Descuento:</label>";
            echo "<input type='text' name='descuento' id='descuento' value='" . $row['DescuentoDVD'] . "' required><br>";
            echo "<label for='iva'>IVA:</label>";
            echo "<input type='text' name='iva' id='iva' value='" . $row['IVADVD'] . "' required><br>";
            echo "<input type='submit' value='Actualizar'>";
            echo "</form>";
        } else {
            echo "No se encontraron resultados.";
        }
    }
    ?>
    <header>
        <h1 class="titulo">Modificar DVDs</h1>

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
                    <li><a href="#">Todos Los registros</a></li>
                    <li><a href="#">Buscar un registro</a></li>
                    <li><a href="#">Buscar con orden</a></li>
                    <li><a href="#">Buscar registro ordenado</a></li>
                    <li><a href="#">Buscar registro ordenado y limitado</a></li>
                </ul>
            </li>
        </ul>

    </header>
    <main>
        <form action="" method="POST">
            <label for="nombre">Buscar por nombre de álbum:</label>
            <input type="text" name="nombre" id="nombre" required>
            <input type="submit" value="Buscar">
        </form>
    </main>
</body>

</html>