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
     error_reporting(E_ALL);
     ini_set('display_errors', 1);
        // Aqui hacemos la conexion a la base de datos
        $server="localhost";
        $user="root";
        $passw="";
        $db_name="bbddrkmusic";
        // aqui van las tablas que vamos a crear
        $tabladvds="tdrkdvds";
        $tablaventas="tdrkventas";

        $conexion = new mysqli($server,$user,$passw,$db_name);

        if($conexion->connect_error){
            die("Error en la conexion: ".$conexion->connect_error);
        }
       

    
    ?>
    <header>
        <h1></h1>

        <ul>
            <li>Inicio</li>
            <li>Acciones
                <ul>
                    <li>Altas</li>
                    <li>Bajas</li>
                    <li>Modificar</li>
                </ul>
            <li>Consultas
                <ul>
                    <li>Todos Los registros</li>
                    <li>Buscar un registro </li>
                    <li>Buscar con orden</li>
                    <li>Buscar registro ordenado</li>
                    <li>Buscar registro ordenado y limitado</li>
                </ul>
            </li>
            
        </ul>
        
    </header>
    <main>
        <div class="container">
            <h1>Aqui va el contenido de las tablas </h1>
        </div>
    </main>
    <footer><h1>Aqui va informacion del footer </h1></footer>
</body>
</html>