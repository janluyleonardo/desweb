<?php
include('../APP/conexion.inc.php');
if (isset($_GET['name'])) {
  $name = $_GET['name'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>ADMINISTRADOR</title>

  <link rel="shortcut icon" href="IMG/d.png">
  <link href="../CSS/bootstrap.min.css" rel="stylesheet">
  <link href="../CSS/estilos_propios.css?v=1" rel="stylesheet">
</head>

<body>
  <nav class="nabvar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only"></span>
          <!--Este boton despliega la barra de navegacion-->
          <span class="icon-bar"></span>
          <!--estos son los iconos que-->
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span><!-- estan dentro del boton cuando se minimiza la pagina-->
        </button>
        <a class="navbar-brand" href="#">S. G. C.</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <!-- <li><a href="#">Entradas</a></li>
          <li><a href="#">Armadores</a></li>
          <li><a href="#">Autores</a></li>
          <li><a href="#">Libros</a></li> -->
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../index.php">salir</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <div class="container">
    <div class="jumbotron">
      <h1>Bienvenido <?php echo $name; ?></h1>
      <p> Aca puedes ver las materias y los alumnos a tu cargo</p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>
              <span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Crear Profesor
            </h4>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <fieldset>
                <legend>Elige una jornada para el profesor</legend>
                <center>
                  <label>
                    <input type="radio" name="jornada" value="Mañana"> Mañana
                  </label>
                  <label>
                    <input type="radio" name="jornada" value="Tarde"> Tarde
                  </label>
                </center>
              </fieldset>
              <fieldset>
                <legend>Nombre del profesor:</legend>
                <select id="Carrera" name="Carrera">
                  <option class="form-control" value="0">Seleccione:</option>
                  <?php
                  $query = $connect->prepare("SELECT * FROM profesores");
                  $query->execute();
                  $data = $query->fetchAll();

                  foreach ($data as $valores) :
                    echo '<option class="form-control" value="' . $valores["ID_Profesor"] . '">' . $valores["Nom_Profesor"] . '</option>';
                  endforeach;
                  ?>
                </select>
              </fieldset>
              <br>
              <button class="form-control" onclick="mensaje()">Cargar profesor</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>
              <span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Crear carrera
            </h4>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <fieldset>
                <legend>Elige una modalidad</legend>
                <center>
                  <label>
                    <input type="radio" name="jornada" value="Virtual"> Virtual
                  </label>
                  <label>
                    <input type="radio" name="jornada" value="Presencial"> Presencial
                  </label>
                </center>
              </fieldset>
              <fieldset>
                <legend>Nombre de la carrera:</legend>
                <select id="Carrera" name="Carrera">
                  <option class="form-control" value="0">Seleccione:</option>
                  <?php
                  $query = $connect->prepare("SELECT * FROM carrera");
                  $query->execute();
                  $data = $query->fetchAll();

                  foreach ($data as $valores) :
                    echo '<option class="form-control" value="' . $valores["id"] . '">' . $valores["id"] . " " . $valores["nombre"] . '</option>';
                  endforeach;
                  ?>
                </select>
              </fieldset>
              <br>
              <button class="form-control" onclick="mensaje()">Cargar carrera</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>
              <span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Crear materia
            </h4>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <fieldset>
                <legend>Elige una materia</legend>
              </fieldset>
              <br>
              <fieldset>
                <legend>Nombre de la materia</legend>
                <select id="Carrera" name="Carrera">
                  <option class="form-control" value="0">Seleccione:</option>
                  <?php
                  $query = $connect->prepare("SELECT * FROM materias");
                  $query->execute();
                  $data = $query->fetchAll();

                  foreach ($data as $valores) :
                    echo '<option class="form-control" value="' . $valores["ID_Materia"] . '">' . $valores["ID_Carrera"] . " " . $valores["Nom_Materia"] . '</option>';
                  endforeach;
                  ?>
                </select>
              </fieldset>
              <br>
              <button class="form-control" onclick="mensaje()">Cargar materia</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <center>
                  <h3>
                    <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                    Registrar datos de profesor
                  </h3>
                </center>
              </div>

              <div class="panel-body">
                <form action="" method="post">
                  <input type="text" name="nombreForm" id="nombreForm" class="form-control"
                    placeholder="Nombre de profesor"><br>
                  <input type="text" name="carreraForm" id="carreraForm" class="form-control"
                    placeholder="Carrera de profesor"><br>
                  <input type="text" name="materiaForm" id="materiaForm" class="form-control"
                    placeholder="Materia de profesor"><br>
                  <input type="text" name="jornadaForm" id="jornadaForm" class="form-control"
                    placeholder="Jornada de profesor"><br>
                  <input type="submit" class="form-control" value="Registrar" onclick="mensaje()">
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-3"></div>

        </div>

      </div>



    </div>
  </div>



  <script src="../JS/operaciones.js"></script>
  <script src="../JS/jquery.min.js"></script>
  <script src="../JS/bootstrap.min.js"></script>
</body>

</html>