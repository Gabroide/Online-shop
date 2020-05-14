<?php require_once('../Connections/conexion.php'); 
RestringirAcceso("1");?>

<?php
//MySQLi Fragmentos por http://www.dreamweaver-tutoriales.com
//Copyright Jorge Vila 2015

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "forminsertar")) {
	

	
  $updateSQL = sprintf("UPDATE tblmoneda SET strNombre=%s, dblValor=%s, strSimbolo=%s, strCodificacion=%s, strHTML=%s WHERE idMoneda=%s",
                       GetSQLValueString($_POST["strNombre"], "text"),					   GetSQLValueString(ProcesarComaPrecio($_POST["dblValor"]), "double"),
					   GetSQLValueString($_POST["strSimbolo"], "text"),	
					   GetSQLValueString($_POST["strCodificacion"], "text"),	
					   GetSQLValueString($_POST["strHTML"], "text"),	
					   GetSQLValueString($_POST["idMoneda"], "int"));

//echo $updateSQL;
$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

  $updateGoTo = "moneda-lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
	
}

?>
<?php

$query_DatosConsulta = sprintf("SELECT * FROM tblmoneda WHERE idMoneda=%s", GetSQLValueString($_GET["id"], "int"));

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
                    <h1 class="page-header">Gestión de Moneda</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <a href="moneda-lista.php" class="btn btn-outline btn-info">Volver atrás</a><br>
<br>

            
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Editar Moneda
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <form action="moneda-edit.php" method="post" id="forminsertar" name="forminsertar" role="form" >
                                      
                                       
                                        <div class="form-group">
                                            <label>Nombre Moneda</label>
                                            <input class="form-control" placeholder="Escribir Nombre de la marca" name="strNombre" id="strNombre" value="<?php echo $row_DatosConsulta["strNombre"];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Símbolo</label>
                                            <input class="form-control" placeholder="Escribir Nombre de la marca" name="strSimbolo" id="strSimbolo" value="<?php echo $row_DatosConsulta["strSimbolo"];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Valor </label>
                                            <input class="form-control" placeholder="Escribir Valor marca" name="dblValor" id="dblValor" value="<?php echo $row_DatosConsulta["dblValor"];?>" required>
                                        </div>
                                         <div class="form-group">
                                            <label>Codificación </label>
                                            <input class="form-control" placeholder="Escribir Valor marca" name="strCodificacion" id="strCodificacion" value="<?php echo $row_DatosConsulta["strCodificacion"];?>" required>
                                        </div>
                                         <div class="form-group">
                                            <label>Código HTML </label>
                                            <input class="form-control" placeholder="Escribir Valor marca" name="strHTML" id="strHTML" value="<?php echo $row_DatosConsulta["strHTML"];?>" required>
                                        </div>
                                        
                                        
                                         
                                          

    


                                        <button type="submit" class="btn btn-success">Editar</button>
                                      <input name="idMoneda" type="hidden" id="idMoneda" value="<?php echo $row_DatosConsulta["idMoneda"];?>">
                                      <input name="MM_insert" type="hidden" id="MM_insert" value="forminsertar">
                                       
                                    </form>
                              </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
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