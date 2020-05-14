<?php require_once('../Connections/conexion.php');
RestringirAcceso("1");?>
<?php


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "forminsertar")) {
	

  $updateSQL = sprintf("UPDATE tblcaracteristica SET strNombre_1=%s,strNombre_2=%s,strNombre_3=%s,strNombre_4=%s, intEstado=%s, intOrden=%s WHERE idCaracteristica=%s",
                       GetSQLValueString($_POST["strNombre_1"], "text"),
					   GetSQLValueString($_POST["strNombre_2"], "text"),
					   GetSQLValueString($_POST["strNombre_3"], "text"),
					   GetSQLValueString($_POST["strNombre_4"], "text"),
					   GetSQLValueString($_POST["intEstado"], "int"),
					   GetSQLValueString($_POST["intOrden"], "int"),					   
					   GetSQLValueString($_POST["idCaracteristica"], "int"));

//echo $updateSQL;
$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

  $updateGoTo = "caracteristica-lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
	}

$query_DatosConsulta = sprintf("SELECT * FROM tblcaracteristica WHERE idCaracteristica=%s", GetSQLValueString($_GET["id"], "int"));

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
    <title>Administración Tienda | Editar Detalle</title>
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
                    <h1 class="page-header">Gestión de Característica</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <a href="caracteristica-lista.php" class="btn btn-outline btn-info" title="Volver Atrás">Volver atrás</a><br>
<br>

            
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Editar Detalle
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <form action="caracteristicadetalle-edit.php" method="post" id="forminsertar" name="forminsertar" role="form" >
                                       <div class="form-group">
                                            <label for="strNombre_1">Nombre del Detalle (Idioma 1)</label>
                                            <input class="form-control" placeholder="Escribir Nombre del Detalle" name="strNombre_1" id="strNombre_1" value="<?php echo $row_DatosConsulta["strNombre_1"];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="strNombre_2">Nombre del Detalle (Idioma 2)</label>
                                            <input class="form-control" placeholder="Escribir Nombre del Detalle" name="strNombre_2" id="strNombre_2" value="<?php echo $row_DatosConsulta["strNombre_2"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="strNombre_3">Nombre del Detalle (Idioma 3)</label>
                                            <input class="form-control" placeholder="Escribir Nombre del Detalle" name="strNombre_3" id="strNombre_3" value="<?php echo $row_DatosConsulta["strNombre_3"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="strNombre_4">Nombre del Detalle (Idioma 4)</label>
                                            <input class="form-control" placeholder="Escribir Nombre de Característica" name="strNombre_4" id="strNombre_4" value="<?php echo $row_DatosConsulta["strNombre_4"];?>">
                                        </div>
                                      	<div class="form-group">
                                            <label for="intOrden">Orden de Característica</label>
                                            <input class="form-control" placeholder="Escribir Orden de la Característica" name="intOrden" id="intOrden" value="<?php echo $row_DatosConsulta["intOrden"];?>" required>
                                        </div>
									   <div class="form-group">
											<label for="intEstado">Estado</label>
											<select name="intEstado" class="form-control" id="intEstado">
												<option value="0" <?php if ($row_DatosConsulta["intEstado"]=="0") echo "selected"; ?>>Inactivo</option>
												<option value="1" <?php if ($row_DatosConsulta["intEstado"]=="1") echo "selected"; ?>>Activo</option>
											</select>
										</div>
                                        <button type="submit" class="btn btn-success" title="Actualizar">Actualizar</button>
                                        <input name="idCaracteristica" type="hidden" id="idCaracteristica" value="<?php echo $row_DatosConsulta["idCaracteristica"];?>">
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