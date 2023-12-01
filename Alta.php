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
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" required>
            <label for="artista">Artista</label>
            <input type="text" name="artista" id="artista" required>
            <label for="año">Año</label>
            <input type="number" name="año" id="año" required>
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" required>
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" required>
            <input type="submit" value="Enviar">
        </form>
        <?php
        if (isset($_POST['id']) && isset($_POST['titulo']) && isset($_POST['artista']) && isset($_POST['año']) && isset($_POST['precio']) && isset($_POST['stock'])) {
            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $artista = $_POST['artista'];
            $año = $_POST['año'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $sql = "INSERT INTO $tabladvds (id,titulo,artista,año,precio,stock) VALUES ('$id','$titulo','$artista','$año','$precio','$stock')";
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