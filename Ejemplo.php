<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new Alumno();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('id',              $_REQUEST['id']);
			$alm->__SET('Nombre',          $_REQUEST['Nombre']);
			$alm->__SET('Apellido',        $_REQUEST['Apellido']);
			$alm->__SET('Sexo',            $_REQUEST['Sexo']);
			$alm->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);

			$model->Actualizar($alm);
			header('Location: Ejemplo.php');
			break;

		case 'registrar':
			$alm->__SET('Nombre',          $_REQUEST['Nombre']);
			$alm->__SET('Apellido',        $_REQUEST['Apellido']);
			$alm->__SET('Sexo',            $_REQUEST['Sexo']);
			$alm->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);

			$model->Registrar($alm);
			header('Location: Ejemplo.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['id']);
			header('Location: Ejemplo.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['id']);
			break;
	}
}

?>

<!DOCTYPE html>
<html lang="es">

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Programación web I</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/freelancer.css" rel="stylesheet">
    <link href="css/styleb24d.css?1.0.2" rel="stylesheet">
</head>
  <body id="" class="">

    <!-- Navigation -->
      <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase base" id="mainNav">
          <img class="img-nav" src="img/Unad-Blanco.png" alt="">
          <div class="container ">

              <a class="navbar-brand js-scroll-trigger" href="index-2.html">Programación web I</a>
              <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  Menu
                  <i class="fas fa-bars"></i>
              </button>
              <div class="collapse navbar-collapse " id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item mx-0 mx-lg-1">
                          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="Insercion.html">Inserción</a>
                      </li>
                      <li class="nav-item mx-0 mx-lg-1">
                          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="Consulta.html">Consulta</a>
                      </li>
                      <li class="nav-item mx-0 mx-lg-1">
                          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="Actualizacion.html">Actualización</a>
                      </li>
                      <li class="nav-item mx-0 mx-lg-1">
                          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="Eliminacion.html">Eliminación</a>
                      </li>
                      <li class="nav-item mx-0 mx-lg-1">
                          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="Autores.html">Autor</a>
                      </li><li class="nav-item mx-0 mx-lg-1">
                          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="Ejemplo.html">Actividades</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center colorPrimario">
      <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="img/profile.html" alt="">
        <h1 class="text-uppercase mb-0">ejemplo</h1>
        <hr >
        <h4 class="font-weight-light mb-0">
            EJEMPLO DE PHP Y MYSQL. 
        </h4>
      </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section class="" id="">
        <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                    <p class="cuerpo">
					<div class="pure-g">
            <div class="pure-u-1-12">
			<center>
                
                <form action="?action=<?php echo $alm->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
                    
                    <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" name="Nombre" value="<?php echo $alm->__GET('Nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Apellido</th>
                            <td><input type="text" name="Apellido" value="<?php echo $alm->__GET('Apellido'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Sexo</th>
                            <td>
                                <select name="Sexo" style="width:100%;">
                                    <option value="1" <?php echo $alm->__GET('Sexo') == 1 ? 'selected' : ''; ?>>Masculino</option>
                                    <option value="2" <?php echo $alm->__GET('Sexo') == 2 ? 'selected' : ''; ?>>Femenino</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Fecha</th>
                            <td><input type="text" name="FechaNacimiento" value="<?php echo $alm->__GET('FechaNacimiento'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">Apellido</th>
                            <th style="text-align:left;">Sexo</th>
                            <th style="text-align:left;">Nacimiento</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('Nombre'); ?></td>
                            <td><?php echo $r->__GET('Apellido'); ?></td>
                            <td><?php echo $r->__GET('Sexo') == 1 ? 'H' : 'F'; ?></td>
                            <td><?php echo $r->__GET('FechaNacimiento'); ?></td>
                            <td>
                                <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </center>
            </div>
        </div>
					</p>
                    <hr>
                    </br>
                <div class="col-md-12">
                        </br>
                </div>
              </div>
                </div>
            </div>
        
    </section>

    <!-- About Section -->
    <section class="" id="">
     
    </section>

    <!-- Contact Section -->
   

    <!-- Footer -->
    <footer class="footer text-center colorPrimario" style="background-color:#838383" >
      <div class="container">
          <div class="row">
              
              <div class="col-md-4 mb-5 mb-lg-0">
                  <br /><br />
                  <h4 class="text-uppercase mb-4">Redes sociales </h4>
                  <ul class="list-inline mb-0">
                      <li class="list-inline-item">
                          <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://www.facebook.com/UniversidadUNAD/">
                              <i class="fab fa-fw fa-facebook-f"></i>
                          </a>
                      </li>
                     
                      <li class="list-inline-item">
                          <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://twitter.com/universidadunad?lang=es">
                              <i class="fab fa-fw fa-twitter"></i>
                          </a>
                      </li>

                  </ul>
              </div>
              <div class="col-md-2 mb-5 mb-lg-0">

              </div>
              <div class="col-md-6 footer_U">
                  <img class="img-footer" src="img/logoUnad_color.png" alt="">
                  <p class="lead mb-0">
                      Sede nacional José Celestino Mutis: Calle 14 sur No. 14 - 23
                      PBX: ( +57 1 ) 344 3700 Bogotá D.C., Colombia
                      Línea nacional gratuita desde Colombia: 018000115223
                      Atención al usuario: atencionalusuario@unad.edu.co
                      Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación Nacional
                      <a href="https://www.unad.edu.co/"> UNAD</a>.
                  </p>
              </div>
          </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación Nacional</small><br/>
            <small>Copyright &copy; unad 2019</small>
        </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

   

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

  </body>
</html>
