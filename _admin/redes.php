<?php require_once('../Connections/conexion.php'); 
RestringirAcceso("1");?>

<?php
//MySQLi Fragmentos por http://www.dreamweaver-tutoriales.com
//Copyright Jorge Vila 2015

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$mensajeexito=0;

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "forminsertar")) 
{
	$updateSQL = sprintf("UPDATE tblredes SET strFacebook=%s, strLinkedIn=%s, strYoutube=%s, strWhatsApp=%s, strInstagram=%s,  	strPinterest=%s, 	strTwitter=%s  WHERE idRedes=%s",
                       GetSQLValueString($_POST["strFacebook"], "text"),
					   GetSQLValueString($_POST["strLinkedIn"], "text"),
					   GetSQLValueString($_POST["strYoutube"], "text"),		  
					   GetSQLValueString($_POST["strWhatsApp"], "text"),
					   GetSQLValueString($_POST["strInstagram"], "text"),
					   GetSQLValueString($_POST["strPinterest"], "text"),
					   GetSQLValueString($_POST["strTwitter"], "text"),
					   GetSQLValueString($_POST["idRedes"], "int") );
//echo $updateSQL;
$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
	
$mensajeexito=1;
}

?>
<?php

	$query_DatosConsulta = sprintf("SELECT * FROM tblredes WHERE idRedes=1");

	$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error($con));
	$row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta);
	$totalRows_DatosConsulta = mysqli_num_rows($DatosConsulta);
	?>
<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Administracion.dwt.php" codeOutsideHTMLIsLocked="false" -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Administración Tienda | Redes Sociales</title>
    <!-- InstanceEndEditable -->
    <!-- Bootstrap Core CSS -->
    <?php include("../includes/adm-header.php"); ?>

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
                    <h1 class="page-header">Redes Sociales</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <?php /*?><a href="usuario-lista.php" class="btn btn-outline btn-info">Volver atrás</a><br><?php */?>
<br>

 <?php if ($mensajeexito==1){?>
			<div class="row">
                <div class="col-lg-12">
                <div class="alert alert-success">La configuración de las Redes Sociales se ha guardado correctamente.</div>
			</div>
		</div>     
<?php }?>
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Editar Redes Sociales
                        </div>
                        <div class="panel-body">
                           <form action="redes.php" method="post" id="forminsertar" name="forminsertar" role="form" >
                            <div class="row">
                                <div class="col-lg-6">
                                  	<div class="form-group">
                                    	<label for="strFacebook">Facebook</label>
                                        <input class="form-control" placeholder="Facebook de la empresa" name="strFacebook" id="strFacebook" value="<?php echo $row_DatosConsulta["strFacebook"];?>">
                                   	</div>
									<div class="form-group">
										<label for="strLinkedIn">LinkedIn</label>
										<input class="form-control" placeholder="LinkedIn de la empresa" name="strLinkedIn" id="strLinkedIn" value="<?php echo $row_DatosConsulta["strLinkedIn"];?>">
									</div>
									<div class="form-group">
										<label for="strYoutube">Youtube</label>
										<input class="form-control" placeholder="Canal de Youtube de la empresa" name="strYoutube" id="strYoutube" value="<?php echo $row_DatosConsulta["strYoutube"];?>">
									</div>
									<div class="form-group">
										<label for="strWhatsApp">WhatsApp de la empresa</label>
										<input class="form-control" placeholder="Número de whatsApp de la empresa" name="strWhatsApp" id="strWhatsApp" value="<?php echo $row_DatosConsulta["strWhatsApp"];?>">
									</div>
									<div class="form-group">
										<label for="strInstagram">Instagram</label>
										<input class="form-control" placeholder="Instagram de la empresa" name="strInstagram" id="strInstagram" value="<?php echo $row_DatosConsulta["strInstagram"];?>">
									</div>
									 <div class="form-group">
										<label for="strPinterest">Pinterest</label>
										<input class="form-control" placeholder="Pinterest de la empresa" name="strPinterest" id="strPinterest" value="<?php echo $row_DatosConsulta["strPinterest"];?>">
									</div>
                                       <div class="form-group">
										<label for="strTwitter">Twitter</label>
										<input class="form-control" placeholder="Twiter de la empresa" name="strTwitter" id="strTwitter" value="<?php echo $row_DatosConsulta["strTwitter"];?>">
									</div>
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                    <input name="idRedes" type="hidden" id="idRedes" value="<?php echo $row_DatosConsulta["idRedes"];?>">
                                    <input name="MM_insert" type="hidden" id="MM_insert" value="forminsertar">
                            	</div>
                                <!-- /.col-lg-6 (nested) -->
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

     <?php include("../includes/adm-foot.php"); ?>
   

</body>

<!-- InstanceEnd --></html>