<?php require_once('../Connections/conexion.php'); 
RestringirAcceso("1, 10");?>

<?php
//MySQLi Fragmentos por http://www.dreamweaver-tutoriales.com
//Copyright Jorge Vila 2015

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$mensajeexito=0;

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "forminsertar")) {

	
$updateSQL = sprintf("UPDATE tblidioma SET strIdioma=%s WHERE idIdioma=1",
                       GetSQLValueString($_POST["strIdioma1"], "text"));
$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
$updateSQL = sprintf("UPDATE tblidioma SET strIdioma=%s WHERE idIdioma=2",
                       GetSQLValueString($_POST["strIdioma2"], "text"));
$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
$updateSQL = sprintf("UPDATE tblidioma SET strIdioma=%s WHERE idIdioma=3",
                       GetSQLValueString($_POST["strIdioma3"], "text"));
$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
$updateSQL = sprintf("UPDATE tblidioma SET strIdioma=%s WHERE idIdioma=4",
                       GetSQLValueString($_POST["strIdioma4"], "text"));
$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
	
$mensajeexito=1;


}

?>
<?php

$query_DatosConsulta = sprintf("SELECT * FROM tblidioma ORDER BY idIdioma ASC");

$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error($con));
$row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta);
$totalRows_DatosConsulta = mysqli_num_rows($DatosConsulta);
?><!DOCTYPE html>
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

            <?php /*?><a href="usuario-lista.php" class="btn btn-outline btn-info">Volver atrás</a><br><?php */?>
<br>

 <?php if ($mensajeexito==1){?>
<div class="row">
                <div class="col-lg-12">
                <div class="alert alert-success">La configuración de idiomas se ha guardado correctamente.</div>
	</div>
</div>     
<?php }?>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Editar Página de pie
                        </div>
                        <div class="panel-body">
                           <form action="pie-edit.php" method="post" id="forminsertar" name="forminsertar" role="form" >
                            <div class="row">
                                <div class="col-lg-6">
                 
<?php 
	$contador=1;
	do {
	?>
		
			<div class="form-group">
				<label>Idioma <?php echo $contador;?></label><br>
                <a href="pie-edit.php?fic=<?php echo $contador;?>.php">Editar pie de página de este idioma</a> </div>
<?php
	$contador++;
	}
	while ($row_DatosConsulta=mysqli_fetch_assoc($DatosConsulta))?>
                                      
                                      
        

                                                                
                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                    
                                      <input name="MM_insert" type="hidden" id="MM_insert" value="forminsertar">
                                       
                                    
                              </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                 <div class="col-lg-6">

								</div>
                            </div>
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