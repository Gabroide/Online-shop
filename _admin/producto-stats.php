<?php require_once('../Connections/conexion.php');
RestringirAcceso("1, 10");?>
<?php
//MySQLi Fragmentos por http://www.dreamweaver-tutoriales.com
//Copyright Jorge Vila 2015


$query_DatosProducto = "SELECT DATE_FORMAT(fchFecha, '%Y') as 'year', DATE_FORMAT(fchFecha, '%m') as 'month', COUNT(refProducto) as 'total' FROM tblproductovisita WHERE refProducto = ".GetSQLValueString($_GET["id"], "int")." GROUP BY DATE_FORMAT(fchFecha, '%Y%m')";
$DatosProducto = mysqli_query($con,  $query_DatosProducto) or die(mysqli_error($con));
$row_DatosProducto = mysqli_fetch_assoc($DatosProducto);
$totalRows_DatosProducto = mysqli_num_rows($DatosProducto);

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
    <title>Administración Tienda | Estadísticas</title>
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
                    <h1 class="page-header">Estadísticas de Producto</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <a href="producto-lista.php" class="btn btn-outline btn-info" title="Volver Atrás">Volver atrás</a><br>
<br>

            
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Estadísticas de Producto
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php
	if ($totalRows_DatosProducto==0){
		echo "No hay visitas";
	}
		?>
                        
                            <div id="morris-area-chart"></div>
                        
                            
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

<!-- InstanceEnd -->

<?php
	if ($totalRows_DatosProducto>0){
		?>
		<script>
$(function() {

     Morris.Bar({
        element: 'morris-area-chart',
        data: [
		
		<?php
		$contador=1;
		do {
			?>
			{
            y: '<?php echo $row_DatosProducto["year"];?>-<?php echo $row_DatosProducto["month"];?>',
            a: <?php echo $row_DatosProducto["total"];?>
        }
			
			<?php
			if ($contador!=$totalRows_DatosProducto) echo ",";
              		 } while ($row_DatosProducto = mysqli_fetch_assoc($DatosProducto)); 
	?>
],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Visitas'],
        hideHover: 'auto',
        resize: true
    });
});
			<?php }?>
	</script>
</html>