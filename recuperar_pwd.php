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
				<div class="col-lg-6">
                    <div class="panel panel-green">
                        <div class="panel-heading"><?php echo _T88;?></div>
                        <div class="panel-body">
                           <div class="login-form">
                            <form id="form1" name="form1" method="post" action="recuperar_pwd_paso_1.php">

          <div class="form-group">
            <label for="textfield"></label>
          <input type="email" name="textfield" id="textfield" required placeholder="<?php echo _T89;?>"/>
          </div>

             <input class="btn btn-default" type="submit" name="button" id="button" value="<?php echo _T90;?>"  />

        </form>
                        </div></div>
                       
                    </div>
                    <!-- /.col-lg-4 -->
                
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