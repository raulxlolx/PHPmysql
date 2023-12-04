<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        table {
            background-color: #f2f2f2;
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
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
    ?>
    <header>
        <h1 class="titulo">Bajas Dvd</h1>

        <ul>
            <a href="index.php"><li>Inicio</li></a>
            <li>Acciones
                <ul>
                    <li><a href="Alta.php">Altas</a></li>
                    <li><a href="#">Bajas</a></li>
                    <li><a href="modificar.php">Modificar</a></li>
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

        
        <form action="" method="GET">
            <label for="titulo_album">Título de Álbum</label>
            <input type="text" name="titulo_album" id="titulo_album" required>
            <input type="submit" value="Buscar">
        </form>

        <?php
                    if (isset($_GET['action']) && $_GET['action'] == "delete") {
                        $id = $_GET['id'];
                        $sql2 = "DELETE FROM $tabladvds WHERE ID_DVD='$id'";
                        if ($conexion->query($sql2) === TRUE) {
                          
                        } else {
                            
                        }
                    }
        if (isset($_GET['titulo_album'])) {
            $titulo_album = $_GET['titulo_album'];
            $sql = "SELECT * FROM $tabladvds WHERE NombreDVD LIKE '%$titulo_album%'";
            $result = $conexion->query($sql);
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Nombre</th><th>Artista</th><th>Estilo Musical</th><th>Año</th><th>Número de Canciones</th><th>Títulos de Canciones</th><th>Cantidad</th><th>Precio</th><th>Descuento</th><th>IVA</th><th>Acciones</th></tr>";
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
                    echo "<td><a href='bajas.php?id=" . $row['ID_DVD'] . "&action=delete'>Eliminar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No se encontraron resultados.";
            }

        }
        ?>
    </main>
</body>

</html>