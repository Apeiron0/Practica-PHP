<?php
// Programa:       Catalogo.php
// Descripcion:    Despliega una lista de categorias de mascotas de la tabla
//tipomascota. Incluye las descripciones
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Tipos de Mascotas</title>
   </head>
   <body>
     <?php
      include("misc.inc");

      //Crear coneccion
      $coneccion=mysqli_connect($huesped,$usuario,$clave,$base_de_datos) or die("No se pudo conectar al servidor");

      //Selecciona todas las categorias de la tabla tipomascota
      $consulta="select * from tipodemascota";
      //$resultado=$coneccion->query($consulta);
      $resultado=mysqli_query($coneccion,$consulta);

      //desplegar texto antes del formulario

      echo
      "<div style='margin-left:.lin'>
        <h1 align-center>Catalogo de Mascotas</h1>
        <h2 align-center>Los siguientes animales le esperan</h2>
        <p align-center>
        Encuentre justo lo que desea y apresurese a venir a la tienda a recoger a su nuevo amigo
        </p>
        <p>
        <h3>En cual mascota esta usted interesado?</h3>
        ";
        //Crear formulario que contenga una lista de seleccion
        echo "<form action='mostrar.php' method='post'>";
        echo "<table cellpadding='5' border='1'>";
        $contador=1;
        while ($fila =mysqli_fetch_assoc($resultado)) {
          extract($fila);
          echo "<tr> <td align-top width='15%'";
          echo "<input type='radio' nombre='interes' valor='$Tipomascota'";
          if ($contador==1) {
            echo "revisado";
          }
          echo "><font size='+1'><b>$Tipomascota</b></font>";
          echo "</td>
                <td>$Descripciontipo</td>";
          echo "</tr>";
          $contador++;
        }
        echo "</table>";
        echo "<p>
        <input type='submit' valor='Elija un tipo de mascota' />
        </form>
        </p>";

      ?>
    </div>

   </body>
 </html>
