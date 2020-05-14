<?php require_once('Connections/conexion.php'); ?>
<?php
//MySQLi Fragmentos por http://www.dreamweaver-tutoriales.com
//Copyright Jorge Vila 2015

$variable_Consulta = "0";
if(isset($VARIABLE)){
	$variable_Consulta = $VARIABLE;
}

$resultadosporclick=6;

$query_DatosConsultaTotales = sprintf("SELECT COUNT(idProducto) AS TotalProductosConsulta FROM tblproducto WHERE intEstado=1 AND intPrincipal=1 ORDER BY idProducto ASC");
$DatosConsultaTotales = mysqli_query($con,  $query_DatosConsultaTotales) or die(mysqli_error($con));
$row_DatosConsultaTotales = mysqli_fetch_assoc($DatosConsultaTotales);
$totalRows_DatosConsultaTotales = mysqli_num_rows($DatosConsultaTotales);

$totalresultados=$row_DatosConsultaTotales["TotalProductosConsulta"];

$query_DatosConsulta = sprintf("SELECT idProducto FROM tblproducto WHERE intEstado=1 AND intPrincipal=1 ORDER BY idProducto ASC LIMIT 0,".$resultadosporclick);
$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error($con));
$row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta);
$totalRows_DatosConsulta = mysqli_num_rows($DatosConsulta);

//FINAL DE LA PARTE SUPERIOR
?>
             

<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
		<!-- InstanceBeginEditable name="doctitle" -->
		<title>Home | E-Shopper</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- InstanceEndEditable -->
		<?php include("includes/cabecera.php"); ?>
		<!-- InstanceBeginEditable name="head" -->
		<!-- InstanceEndEditable -->
	</head><!--/head-->

	<body>
		<!-- InstanceBeginEditable name="Contenido" -->
		<?php include("includes/header.php"); ?>
		<?php include("includes/slider.php"); ?>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<?php include("includes/menuizquierda.php"); ?>
					</div>
					<div class="col-sm-9 padding-right">
						<div class="features_items"><!--features_items-->
							<h2 class="title text-center"><?php echo _T10;?></h2>
						
							<?php 
							//AQUI ES DONDE SE SACAN LOS DATOS, SE COMPRUEBA QUE HAY RESULTADOS
							if($totalRows_DatosConsulta > 0){  
								do{ 
									?>
									<div class="col-sm-4">
										<?php 
										MostrarProducto($row_DatosConsulta["idProducto"]);
										?>
									</div>
              		
									<?php
								} while($row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta)); 
			
								$tutorial_id=1;
								if($totalresultados>$resultadosporclick){
									?>
									<div style="text-align: center">
										<div class="btn btn-default add-to-cart" id="show_more_main<?php echo $tutorial_id; ?>">
											<span id="<?php echo $tutorial_id; ?>" class="show_more" title="<?php echo _T17;?>"><?php echo _T17;?></span>
											<span class="loding" style="display: none;"><span class="loding_txt"><?php echo _T18;?></span></span>
										</div> </div>
									<?php
								}
							} 
							else{ //MOSTRAR SI NO HAY RESULTADOS ?>
								<?php echo _T19;?>
								<?php } ?>
						
						</div>
						<?php include("includes/categoriasespeciales.php"); ?>
						<?php 
						if(isset($_SESSION['tienda2017Front_UserId']))
						include("includes/recomendados.php"); ?>
						<?php include("includes/masvendidos.php"); ?>
					</div>
				</div>
			</div>
		</section>
		<?php include("includes/pie.php"); ?>
		<?php include("includes/piejs.php"); ?>
		<script>
			//CON BOTON PARA AVANZAR
			$(document).ready(function(){
					$(document).on('click','.show_more',function(){
							var ID = $(this).attr('id');
							$('.show_more').hide();
							$('.loding').show();
							$.ajax({
									type:'POST',
									url:'ajax_more.php',
									data:'id='+ID+'&max=<?php echo $resultadosporclick;?>'+'&principal=1',
									success:function(html){
										$('#show_more_main'+ID).remove();
										$('.features_items').append(html);
									}
								}); 
						});
				});
		</script>
		<!-- InstanceEndEditable -->
	</body>
	<!-- InstanceEnd --></html>
<?php
//AÑADIR AL FINAL DE LA PÁGINA
mysqli_free_result($DatosConsulta);
?>