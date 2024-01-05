<!DOCTYPE html>
<?php

include("control_sesion/seguridad.php");
include("functions/traductor.php");
include("connection.php");

$section = "reports";

$url = $_SERVER["REQUEST_URI"];
$urlArray = explode('=', $url);
$id_url = $urlArray[1];

?>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>blackstone5 - <?php echo lang("Vulnerabilities");?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/faces/black-stone-transaprent.png" />
  </head>

  <body class="sidebar-icon-only">


    <div class="container-scroller">

    <?php
      include("nav.php");
    ?>
      
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="<?php echo lang("Search Reports"); ?>">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email"></i>
                  <span class="count bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0"><?php echo lang("Messages");?></h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="https://microjoan.com/" target="_blank">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/microjoan.png" href="https://microjoan.com/" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">MicroJoan</p>
                      <p class="text-muted mb-0">  <?php echo lang("Now");?> </p>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="assets/images/faces/black-stone.png" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">blackstone5</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0"><?php echo lang("Profile");?></h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="editar_perfil.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1"><?php echo lang("Settings"); ?></p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="cerrar_sesion.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1"><?php echo lang("Log out"); ?></p>
                    </div>
                  </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <?php 
            $sentencia = "select * from scope_vulnerabilidades where id=".$id_url;    
            $consulta = mysqli_query($connection, $sentencia) or die("Error de Consulta");

            //vamos a recorrer la consulta y guardar los datos 
            while($file= mysqli_fetch_array($consulta)){
              
              $name=$file['name'];
            }
          ?>

            <div class="page-header">
              <h3 class="page-title"> <?php echo lang("Edit Vulnerability"); echo " '".$name."'"?> </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="vulnerabilidades.php"><?php echo lang("Vulnerabilities");?></a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo lang("Edit Vulnerability");?></li>
                </ol>
              </nav>
            </div>
            
            <?php
                $sentencia = "select * from scope_vulnerabilidades where id=".$id_url;    
                $consulta = mysqli_query($connection, $sentencia) or die("Error de Consulta");

                //vamos a recorrer la consulta y guardar los datos 
                while($file= mysqli_fetch_array($consulta)){
                  $id=$file['id'];
                  $name=$file['name'];
                  $descripcion=$file['descripcion'];
                  $solucion=$file['solucion'];
                  $nivel_num=$file['nivel'];
                  $esfuerzo=$file['esfuerzo'];
                  $seccion_auditoria=$file['seccion_auditoria'];
                  $recommendation=$file['recommendation'];

                  if($nivel_num == 1){
                      $nivel = 'Low';
                  }else if ($nivel_num == 2){
                      $nivel = 'Medium';
                  }else if ($nivel_num == 3){
                      $nivel = 'High';
                  }else if ($nivel_num == 4){
                  $nivel = 'Very High';
                  }

                  if($esfuerzo == 1){
                      $esfuerzo_desc = 'Quick Win';
                  }else if($esfuerzo == 2){
                      $esfuerzo_desc = 'Low';
                  }else if($esfuerzo == 3){
                    $esfuerzo_desc = 'Medium';
                  }else if($esfuerzo == 4){
                    $esfuerzo_desc = 'High';
                  }else if($esfuerzo == 5){
                    $esfuerzo_desc = 'Very High';
                  }
                  
                }
            ?>    

            <div class="row">
              
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" form action="" method="post">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo lang("Name");?></label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo lang("Name");?>" value="<?php echo $name?>" style="color:white;">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo lang("Criticality");?></label> 
                            <div class="col-sm-8 col-8">
                              <select class="form-control" id="exampleSelectGender" style="color:white" name="nivel" required>
                                <option value="<?php echo $nivel_num ?>"><?php echo lang($nivel)?></option>
                                <option value="1"><?php echo lang("Low");?></option>
                                <option value="2"><?php echo lang("Medium");?></option>
                                <option value="3"><?php echo lang("High");?></option>
                                <option value="4"><?php echo lang("Very High");?></option>
                              </select>
                            </div>
                            <label class="col-sm-1 col-1 col-form-label"><i class="mdi mdi-format-line-spacing fs-5"></i></label> 
                          </div>
                        </div>
                      </div>

                      <br>
                      <div class="row">
                        <div class="form-group row">
                          <label for="col-sm-3 col-form-label"><?php echo lang("Description");?></label>
                          <textarea class="form-control m-3 text-white" name="descripcion" id="descripcion" required style="height:150px;"><?php echo $descripcion ?></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group row">
                          <label for="col-sm-3 col-form-label"><?php echo lang("Solution");?></label>
                          <textarea class="form-control m-3 text-white" name="solucion" id="solucion" required style="height:150px;"><?php echo $solucion ?></textarea>
                        </div>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary me-2"><?php echo lang("Save"); ?></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          
            <div class="row">
              
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" form action="" method="post" enctype="multipart/form-data">
                    <h3 class="page-title pb-5"> <?php echo lang("Vulnerability images"); ?> </h3>

                    <?php
                        $sentencia_fotos = "select * from pocs where id_scope_vulnerabilidad=".$id_url;    
                        $consulta_fotos = mysqli_query($connection, $sentencia_fotos) or die("Error de Consulta");

                        //vamos a recorrer la consulta y guardar los datos 
                        while($file_fotos = mysqli_fetch_array($consulta_fotos)){

                            $id_imagen=$file_fotos['id'];
                            $url_imagen=$file_fotos['ruta'];
                            $descripcion_imagen=$file_fotos['descripcion'];
                            $texto_boton=lang("Delete");
                            $texto_descripcion=lang("Description");
                            $texto_orden=lang("Order");
                            $orden_imagen=$file_fotos['orden'];


                            echo '
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <img src="'.$url_imagen.'" style="width:350px;">
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                  <textarea class="form-control text-white" name="descripcion_poc" id="descripcion_poc" style="height:150px;">'.$descripcion_imagen.'</textarea>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="editar_poc.php?id='.$id_imagen.'" style="text-decoration: none;" target="_blank"> 
                                      <i class="mdi mdi-lead-pencil" style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; text-align: center; font-size: 14px; cursor: pointer;"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger" name="eliminar" value="'.$id_imagen.'" style="height: 35px;">'.$texto_boton.'</button>
                                </div>
                            </div><br>
                            ';
                        }
                    ?>
                        <div class="row">
                            <hr>
                            <form class="form-sample" form action="" method="post" enctype="multipart/form-data">
                                <div class="col-sm-4 pt-5">
                                    <div class="form-group">
                                        <input id="imagen" name="imagen" type="file">
                                    </div>
                                </div>
                               
                              <div class="form-group row">
                                <label for="col-sm-7 col-form-label"><?php echo lang("Description");?></label>
                                <textarea class="form-control m-3 text-white" name="descripcion_poc" id="descripcion_poc" style="height:150px;"></textarea>
                              </div>
                      
                                <div class="col-sm-3 pt-5">
                                    <div class="form-group d-flex">
                                        <button type="submit" class="btn btn-success" name="boton" value="Añadir" style="height: 35px;"><?php echo lang("Add image");?></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

            <?php
    
            if (isset($_POST['submit'])){
              
              $name = htmlspecialchars($_POST['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8');       
              $nivel = htmlspecialchars($_POST['nivel'], ENT_QUOTES | ENT_HTML5, 'UTF-8');      
              $descripcion = htmlspecialchars($_POST['descripcion'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); 
              $solucion = htmlspecialchars($_POST['solucion'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
            
              $sentencia = "UPDATE `scope_vulnerabilidades` SET `name`='$name',`descripcion`='$descripcion',`solucion`='$solucion',";
              $sentencia .= " `nivel`='$nivel' WHERE id=".$id_url.";";
          
              $consulta = mysqli_query($connection, $sentencia)or die("Error de consulta");

              if (mysqli_affected_rows($connection)!=0) {
                  echo "<script>alert('Saved')</script>";
                  echo '<script type="text/JavaScript"> location.reload(); </script>';
              }
            }

            if (isset($_POST['eliminar'])){

                $id_imagen = $_POST['eliminar'];

                //sacamos la url de la imagen para eliminarla
                $sentencia_url_imagen = "SELECT * FROM pocs where id=".$id_imagen;
                $consulta_url_imagen = mysqli_query($connection, $sentencia_url_imagen)or die($sentencia);

                while($file_url_imagen = mysqli_fetch_array($consulta_url_imagen)) {
                    $ruta_url_imagen = $file_url_imagen['ruta'];
                }

                //eliminamos la imagen
                unlink($ruta_url_imagen);

                //eliminamos el registro de la base de datos
                $sentencia = "DELETE FROM pocs WHERE id=".$id_imagen;
                $consulta = mysqli_query($connection, $sentencia)or die($sentencia);
        
                if (mysqli_affected_rows($connection)!=0) {
                    echo '<script>location.reload();</script>';
                }
            }

            //funcionalidad para añadir nuevos scopes en cada sección de la auditoría.
            if (isset($_POST['boton']) && ($_POST['boton'] == 'Añadir')){

                $nameOriginal = $_FILES['imagen']['name'];
                $nameTemporal = $_FILES['imagen']['tmp_name'];
                $descripcion_poc = htmlspecialchars($_POST['descripcion_poc'], ENT_QUOTES | ENT_HTML5, 'UTF-8');

                // Obtener la extensión del archivo
                $extension = pathinfo($nameOriginal, PATHINFO_EXTENSION);

                // Generar un nuevo name para la imagen
                $nuevoname = uniqid().'_'.$id_url.'.'.$extension;

                // Ruta donde se guardará la imagen
                $rutaDestino = 'elementos_poc/'.$nuevoname;

                // Mover la imagen al directorio de destino con el nuevo name
                move_uploaded_file($nameTemporal, $rutaDestino);

                //sacamos el último orden de la tabla de este tipo de auditoría
                $sentencia_ultimo_orden = "SELECT orden FROM pocs where id_scope_vulnerabilidad=".$id_url." ORDER BY orden DESC LIMIT 1;" ;
                $consulta_ultimo_orden = mysqli_query($connection, $sentencia_ultimo_orden)or die($sentencia);

                while($file_orden = mysqli_fetch_array($consulta_ultimo_orden)) {
                    $orden = $file_orden['orden'];
                }

                $ultimo_orden = $orden +=1; 

                //insertamos datos en scope
                $sentencia_externa = "INSERT INTO `pocs` (`ruta`, `id_scope_vulnerabilidad`, `orden`, `descripcion`)";
                $sentencia_externa .= " VALUES ('$rutaDestino', '$id_url', '$ultimo_orden', '$descripcion_poc')";

                $consulta_externa = mysqli_query($connection, $sentencia_externa) or die("error");

                echo "<sript>alert('Saved')</script>";
                echo '<script>window.location.href = "editar_vulnerabilidad_scope.php?id='.$id_url.'";</script>';
            }

            ?>

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> <?php echo lang("Free Hacking reporting tool from ");?> <a href="https://microjoan.com/" target="_blank">MicroJoan</a></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->

  </body>
</html>