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
    ?>
    <header>
        <h1 class="titulo">Rk music</h1>

        <ul>
            <a href="index.php"><li>Inicio</li></a>
            <li>Acciones
                <ul>
                    <li><a href="">Altas</a></li>
                    <li><a href="#">Bajas</a></li>
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
        <h1>Alta de DVDs</h1>
        <form action="Alta.php" method="POST">
            <label for="id">ID</label>
            <input type="number" name="id" id="id" required>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required>
            <label for="artista">Artista</label>
            <input type="text" name="artista" id="artista" required>
            <label for="estilo">Estilo Musical</label>
            <input type="text" name="estilo" id="estilo" required>
            <label for="año">Año</label>
            <input type="number" name="año" id="año" required>
            <label for="num_canciones">Número de Canciones</label>
            <input type="number" name="num_canciones" id="num_canciones" required>
            <label for="titulos_canciones">Títulos de Canciones</label>
            <input type="text" name="titulos_canciones" id="titulos_canciones" required>
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" required>
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" required>
            <label for="descuento">Descuento</label>
            <input type="number" name="descuento" id="descuento" required>
            <label for="iva">IVA</label>
            <input type="number" name="iva" id="iva" required>
            <input type="submit" value="Enviar">
        </form>
        <?php
        if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['artista']) && isset($_POST['estilo']) && isset($_POST['año']) && isset($_POST['num_canciones']) && isset($_POST['titulos_canciones']) && isset($_POST['cantidad']) && isset($_POST['precio']) && isset($_POST['descuento']) && isset($_POST['iva'])) {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $artista = $_POST['artista'];
            $estilo = $_POST['estilo'];
            $año = $_POST['año'];
            $num_canciones = $_POST['num_canciones'];
            $titulos_canciones = $_POST['titulos_canciones'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            $descuento = $_POST['descuento'];
            $iva = $_POST['iva'];
            $sql = "INSERT INTO $tabladvds (ID_DVD, NombreDVD, ArtistaDVD, EstiloMusicalDVD, AñoDVD, NumeroCancionesDVD, TitulosCancionesDVD, CantidadDVD, PrecioDVD, DescuentoDVD, IVADVD) VALUES ('$id','$nombre','$artista','$estilo','$año','$num_canciones','$titulos_canciones','$cantidad','$precio','$descuento','$iva')";
            if ($conexion->query($sql) === TRUE) {
                echo "<h1>Registro insertado correctamente</h1>";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion->error;
            }
        }
        ?>
    </main>
</body>

</html>