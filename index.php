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
   <h1 class="titulo">Rk music</h1> 

    <ul>
      <a href=""><li>Inicio</li></a>
      <li>Acciones
        <ul>
          <li><a href="#">Altas</a></li>
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
    <div class="contenido">

      <figure class="disco" id="disco1">
        <div class="disco--cover"></div>
        <div class="disco--vinilo"></div>
        <figcaption class="disco--caption">
          <p>Dark side of the moon</p>
        </figcaption>
      </figure>


      <figure class="disco"  id="disco2">
        <div class="disco--cover"></div>
        <div class="disco--vinilo"></div>
        <figcaption class="disco--caption">
          <p>Light side of the moon</p>
        </figcaption>
      </figure>


      <figure class="disco" id="disco3">
        <div class="disco--cover"></div>
        <div class="disco--vinilo"></div>
        <figcaption class="disco--caption">
          <p>keep walking</p>
        </figcaption>
      </figure>
    </div>
  </main>

  <footer>
    <h1>Aqui va informacion del footer </h1>
  </footer>
  <script src="script.js"></script>
</body>

</html>