<?php require_once('../Connections/conexion.php');
RestringirAcceso("1, 10, 100");?><!DOCTYPE html>
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
<div id="wrapper">
  <!-- Navigation -->
  <?php include("../includes/adm-menu.php"); ?>
  <div id="page-wrapper">
     <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bienvenido</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
             <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        Bienvenido<br><br>

En el  menú de la izquierda puedes ver las opciones de gestión disponibles.<br>
                     <?php
						  $permisoscarpetas=1;
						  clearstatcache();
if (decoct(fileperms("../images/productos") & 0777)!="777") {
	$permisoscarpetas=0;
	echo "Debes dar permisos de escritura a la carpeta images/productos<br>";
}
if (decoct(fileperms("../images") & 0777)!="777") {
	$permisoscarpetas=0;
	echo "Debes dar permisos de escritura a la carpeta images<br>";
}
if (decoct(fileperms("../includes/pie") & 0777)!="777") {
	$permisoscarpetas=0;
	echo "Debes dar permisos de escritura a la carpeta includes/pie<br>";
}
if (decoct(fileperms("../includes/languages") & 0777)!="777") {
	$permisoscarpetas=0;
	echo "Debes dar permisos de escritura a la carpeta includes/languages<br>";
}
if (decoct(fileperms("../includes/languages/1.php") & 0777)!="777") {
	$permisoscarpetas=0;
	echo "Debes dar permisos de escritura al archivo includes/languages/1.php<br>";
}
if (decoct(fileperms("../includes/languages/2.php") & 0777)!="777") {
	$permisoscarpetas=0;
	echo "Debes dar permisos de escritura al archivo includes/languages/2.php<br>";
}
if (decoct(fileperms("../includes/languages/3.php") & 0777)!="777") {
	$permisoscarpetas=0;
	echo "Debes dar permisos de escritura al archivo includes/languages/3.php<br>";
}
if (decoct(fileperms("../includes/languages/4.php") & 0777)!="777") {
	$permisoscarpetas=0;
	echo "Debes dar permisos de escritura al archivo includes/languages/4.php<br>";
}
if (decoct(fileperms("../includes/pie/1.php") & 0777)!="777") {
	$permisoscarpetas=0;
	echo "Debes dar permisos de escritura al archivo includes/pie/1.php<br>";
}
if (decoct(fileperms("../includes/pie/2.php") & 0777)!="777") {
	$permisoscarpetas=0;
	echo "Debes dar permisos de escritura al archivo includes/pie/2.php<br>";
}
if (decoct(fileperms("../includes/pie/3.php") & 0777)!="777") {
	$permisoscarpetas=0;
	echo "Debes dar permisos de escritura al archivo includes/pie/3.php<br>";
}
if (decoct(fileperms("../includes/pie/4.php") & 0777)!="777") {
	$permisoscarpetas=0;
	echo "Debes dar permisos de escritura al archivo includes/pie/4.php<br>";
}
?>
                      </div></div></div></div>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- InstanceEndEditable --><!-- /#wrapper -->

     <?php include("../includes/adm-pie.php"); ?>
   

</body>

<!-- InstanceEnd --></html>
