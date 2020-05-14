<?php require_once('Connections/conexion.php'); ?>

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
<?php //include("includes/slider.php"); ?>
<section>
  <div class="container">
  	
  	<div class="row">
				<div class="col-sm-10 col-sm-offset-2">
					<div class="login-form"><!--login form-->
						<h2><?php echo _T76;?></h2>
						<?php if ($_GET["error"]==1){?>
									<?php echo _T77;?>
                             <?php }?>
                             <?php if ($_GET["error"]==2){?>
									<?php echo _T78;?>
                             <?php }?>
                             <?php if ($_GET["error"]==3){?>
									<?php echo _T79;?>
                             <?php }?>
                             <?php if ($_GET["error"]==5){?>
									<?php echo _T80;?>
                             <?php }?>
                             <?php if ($_GET["error"]==6){?>
									<?php echo _T86;?>
                             <?php }?>
                             
                             <br>
<br>

						
					</div><!--/login form-->
				</div>
				
				
			</div>
  </div>
</section>
<?php include("includes/pie.php"); ?>
<?php include("includes/piejs.php"); ?>

<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
<?php
//AÑADIR AL FINAL DE LA PÁGINA
mysqli_free_result($DatosConsulta);
?>