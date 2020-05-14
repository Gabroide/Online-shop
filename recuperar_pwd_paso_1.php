<?php require_once('Connections/conexion.php'); 

function generar_cadena_password($email)
{
	global $con;

	
	$cadenarecuperacion = substr(md5(rand()*time()),0,30);
	$query_ConsultaFuncion = sprintf("UPDATE tblusuario SET strRecuperar=%s WHERE strEmail=%s",
                       GetSQLValueString($cadenarecuperacion, "text"),
                       GetSQLValueString($email, "text"));
	$Result1 = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error());  
	
	$asunto = _T98;
	$contenido=_T91.'<br><br><a href="'._strURL.'/recuperar_pwd_paso_2.php?email='.$email.'&id='.$cadenarecuperacion.'">'._strURL.'/recuperar_pwd_paso_2.php?email='.$email.'&id='.$cadenarecuperacion.'</a><br><br>'._T92.' </td></tr></table>';
	
	
  $concopia = 0;
  //$destinatariosoporte="info@mssmasterclasses.com";

  
  EnvioCorreoHTML($email, $contenido, $asunto);
	
}

$varEmail_DatosUsuario = "0";
if (isset($_POST["textfield"])) {
  $varEmail_DatosUsuario = $_POST["textfield"];
}

$query_DatosConsulta = sprintf("SELECT * FROM tblusuario WHERE strEmail = %s AND intEstado=1", GetSQLValueString($varEmail_DatosUsuario, "text"));
$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error());
$row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta);
$totalRows_DatosConsulta = mysqli_num_rows($DatosConsulta);
?>?>

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
                        <div class="panel-heading"><?php echo _T93;?></div>
                        <div class="panel-body">
                          <?php if ($totalRows_DatosConsulta == 1){
	generar_cadena_password($_POST["textfield"]);
	?>
<p><?php echo _T94;?></p>

<?php }
else
{?>
<?php echo _T95;?> <?php echo $_POST["textfield"]; ?> <?php echo _T96;?> <a href="recuperar_pwd.php"><?php echo _T97;?></a>
<?php }?></div>
                       
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