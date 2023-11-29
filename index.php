<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php 
        // Aqui hacemos la conexion a la base de datos
        $server="localhost";
        $user="root";
        $passw="";
        $db_name="bbddrkMusic";
        // aqui van las tablas que vamos a crear
        $tabladvds="tdrkdvds";
        $tablaventas="tdrkventas";

        $conexion = new mysqli($server,$user,$passw,$db_name);

        if($conexion->connect_error){
            die("Error en la conexion: ".$conexion->connect_error);
        }
       

    
    ?>
    <header><h1>Esto es el menu</h1></header>
    <main>
        <div class="container">
            <h1>Aqui va el contenido de las tablas </h1>
        </div>
    </main>
    <footer><h1>Aqui va informacion del footer </h1></footer>
</body>
</html>