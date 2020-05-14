<?php require_once('Connections/conexion.php'); ?>
<?php
if ($_POST["intClave"]==7){
	if (comprobaremailnoexiste($_POST["strEmail"]))
	{


		  $insertSQL = sprintf("INSERT INTO tblusuario(strEmail, strPassword, strNombre, intNivel, intEstado, fchAlta) VALUES (%s, %s, %s, %s, %s, NOW())",
							   GetSQLValueString($_POST["strEmail"], "text"),
							   GetSQLValueString(md5($_POST["strPassword"]), "text"),
							   GetSQLValueString($_POST["strNombre"], "text"),
							   0,
							   1);


		  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));
			}
			else
			{
				//EL EMAIL NO ES ÚNICO
				 $insertGoTo = "error.php?error=3";
				 header(sprintf("Location: %s", $insertGoTo));
			}
		}
else
	{
		//EL EMAIL NO ES ÚNICO
		 $insertGoTo = "error.php?error=6";
  		 header(sprintf("Location: %s", $insertGoTo));
	}

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
<?php //include("includes/slider.php"); ?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <?php include("includes/menuizquierda.php"); ?>
      </div>
      <div class="col-sm-9 padding-right">
       
      
      
			
			
      
       
       
        <div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?php echo _T24;?></h2>
						<?php echo _T25;?>
						
 
					</div>
        <?php //include("includes/categoriasespeciales.php"); ?>
        <?php //include("includes/recomendados.php"); ?>
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