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
     <script src="https://code.jquery.com/jquery-2.2.4.min.js" crossorigin="anonymous"></script>
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

     <!-- Optional theme -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

     <!-- Latest compiled and minified JavaScript -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
        <h1 align-center>Catalogo</h1>
        <h2 align-center>Los siguientes ******* le esperan</h2>
        <p align-center>
        Encuentre justo lo que desea y apresurese a venir a la tienda a recoger a su nuevo amigo
        </p>
        <p>
        <h3>En cual ******* esta usted interesado?</h3>
        ";
        //Crear formulario que contenga una lista de seleccion
        echo "<form action='mostrar.php' method='post'>";
        echo "<table cellpadding='5' border='1'>";
        echo"<table class='table table-striped table-bordered table-hover table-condensed'>
          <thead>
            <tr>
              <th>Tipo animal</th>
              <th>Descripcion</th>
            </tr>
          </thead>
          <tbody>
          <div class='input-group'>";
        $contador=1;
        while ($fila =mysqli_fetch_assoc($resultado)) {
          extract($fila);
          echo "<tr>

                  <td>
                    <input type='radio' value='$Tipomascota' />
                    $Tipomascota
                  </td>
                  <td>
                  $Descripciontipo
                  </td>
                </tr>";
          // echo "<tr> <td align-top width='15%'";
          //  echo "<td><input type='radio' name='' value='$Tipomascota'";
          //
          // if ($contador==1) {
          //   echo "revisado";
          // }
          // echo "></td><font size='+1'><b>$Tipomascota</b></font>";
          // echo "</td>
          //       <td>$Descripciontipo</td>";
          // echo "</tr>";
          // $contador++;
        }
        echo " </div>
                </tbody>
              </table>";

        echo "<p>
        <input type='submit' valor='Elija un tipo de mascota' />
        </form>
        </p>";


      ?>
    </div>

   </body>
 </html>
