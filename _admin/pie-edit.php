<?php require_once('../Connections/conexion.php');
RestringirAcceso("1");?>
<?php
//MySQLi Fragmentos por http://www.dreamweaver-tutoriales.com
//Copyright Jorge Vila 2015

if (isset($_POST["fic"]))
{
		//Guardamos el fichero
		$myfile = fopen("../includes/pie/".$_POST["fic"], "w");
		fwrite($myfile, $_POST["contenido"]);	
		//file_put_contents($myfile, $_POST["contenido"]);	
		fclose($myfile);
  header("Location: pie-lista.php");
}


?>
             

<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/Administracion.dwt.php" codeOutsideHTMLIsLocked="false" -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Administración Tienda 2017</title>
    <!-- InstanceEndEditable -->
    <!-- Bootstrap Core CSS -->
    <?php include("../includes/adm-cabecera.php"); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<!-- InstanceBeginEditable name="ContenidoAdmin" -->
<script src="scriptupload.js"></script>
<script src="../js/scriptadmin.js"></script>


<div id="wrapper">
  <!-- Navigation -->
  <?php include("../includes/adm-menu.php"); ?>
  <div id="page-wrapper">
     <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pie de página</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <a href="pie-edit.php" class="btn btn-outline btn-info">Volver atrás</a><br>
<br>

            
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Editar pie de página
                        </div>
                        <?php
						$contenidofichero=""; 
						 $fh = fopen("../includes/pie/".$_GET["fic"],'r');
						while ($line = fgets($fh)) {
						  // <... Do your work with the line ...>
						  $contenidofichero.= $line;
						}
						fclose($fh);
						 ?>
                        <div class="panel-body">
<form action="pie-edit.php" method="post" name="form1" id="form1" >
  
  <textarea cols="100" rows="20" name="contenido" id="contenido"><?php echo $contenidofichero;?></textarea>
  
  <input type="hidden" name="fic" value="<?php echo $_GET["fic"];?>">
  <input type="submit" class="btn btn-success" value="Guardar">

  </form>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                
                <!-- /.col-lg-6 -->
            </div>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- InstanceEndEditable --><!-- /#wrapper -->

     <?php include("../includes/adm-pie.php"); ?>
   

</body>

<!-- InstanceEnd --></html>