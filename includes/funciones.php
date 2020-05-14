<?php 


if (isset($_GET['idioma']))
{
		$_SESSION["idiomaactual"] = $_GET['idioma'];
		define('_idiomaactual', $_GET['idioma']);
}

if ((!isset($_SESSION['idiomaactual'])) || ($_SESSION['idiomaactual']=="")) 
	{
	  $_SESSION['idiomaactual'] = 1;
		define('_idiomaactual', $_SESSION['idiomaactual']);
    }
if (isset($_SESSION['idiomaactual'])) 
{
	if (!defined('_idiomaactual')) 
		define('_idiomaactual', $_SESSION['idiomaactual']);
}



switch (_idiomaactual) {
    case 1:
		if (is_file("includes/languages/1.php"))  include("includes/languages/1.php"); 
		break;
    case 2:
		if (is_file("includes/languages/2.php"))  include("includes/languages/2.php"); 
	
        break;
    case 3:
		if (is_file("includes/languages/3.php"))  include("includes/languages/3.php"); 
	
        break;
    case 4:
		if (is_file("includes/languages/4.php"))  include("includes/languages/4.php"); 
	
}



//MySQLi Fragmentos por http://www.dreamweaver-tutoriales.com
//Copyright Jorge Vila 2015

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
  global $con;
  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($con, $theValue) : mysqli_escape_string($con,$theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


function MostrarNivel($nivel)
{
	
	switch ($nivel) {
    case 0:
        return '<button type="button" class="btn btn-primary btn-xs">Usuario público</button>';
        break;
    case 1:
         return '<button type="button" class="btn btn-success btn-xs">SuperAdministrador</button>';
        break;
    case 10:
         return '<button type="button" class="btn btn-info btn-xs">Gestor de Ventas</button>';
        break;
    case 100:
         return '<button type="button" class="btn btn-warning btn-xs">Gestor de Productos</button>';
        break;

	}
}

function MostrarEstado($estado)
{
	
	switch ($estado) {
    case 0:
         return '<button type="button" class="btn btn-error btn-danger"><i class="fa fa-times"></i></button>';
        break;
    case 1:
         return '<button type="button" class="btn btn-success btn-circle"><i class="fa fa-check"></i></button>';
        break;
	}
}
function MostrarEstadoPedido($estado)
{
	
	switch ($estado) {
    case 0:
         return '<button type="button" class="btn btn-warning btn-circle" title="Compra Pendiente de Tramitar"><i class="fa fa-times"></i></button>';
        break;
    case 1:
         return '<button type="button" class="btn btn-success btn-circle" title="Compra Tramitada"><i class="fa fa-check"></i></button>';
        break;
	case 2:
         return '<button type="button" class="btn btn-error btn-danger" title="Compra Anulada"><i class="fa fa-times"></i></button>';
        break;
	}
}


//MySQLi Fragmentos por http://www.dreamweaver-tutoriales.com
//Copyright Jorge Vila 2015

function comprobaremailnoexiste($email)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT strEmail FROM tblusuario WHERE strEmail = %s ",
		 GetSQLValueString($email, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion==0) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

function comprobaremailunico($idactual, $email)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT strEmail FROM tblusuario WHERE strEmail = %s AND idUsuario <> %s ",
		 GetSQLValueString($email, "text"),
		 GetSQLValueString($idactual, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion==0) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

function MostrarOrdenCampo($parametroparaprocesar, $orden, $valor, $currentPage, $consultaextendidaparaordenacion){

	if ((isset($orden)) && ($orden!="0"))	{
		if ((isset($valor)) && ($valor==$parametroparaprocesar))
		{
			//SI HAY VALOR Y ORDEN Y ERA ESTE PARÁMETRO
			//SI VENIA DE orden=1
			if ($orden=="1"){
			?>
			<a href="<?php echo $currentPage;?>?orden=2&valor=<?php echo $parametroparaprocesar;?><?php echo $consultaextendidaparaordenacion;?>"><i class="fa fa-angle-double-down"></i></a>
			<?php
			}
			if ($orden=="2"){
			?>
			<a href="<?php echo $currentPage;?>?orden=1&valor=<?php echo $parametroparaprocesar;?><?php echo $consultaextendidaparaordenacion;?>"><i class="fa fa-angle-double-up"></i></a>
			<?php
			}
		}

		else
		{ //SI HAY VALOR Y ORDEN Y PERO NO DE ESTE PARÁMETRO
			?>
			<a href="<?php echo $currentPage;?>?orden=1&valor=<?php echo $parametroparaprocesar;?><?php echo $consultaextendidaparaordenacion;?>"><i class="fa fa-angle-double-up"></i></a>
			<?php

		}
	}
	else
	{ //NO HAY PARÁMETROS
		?>
			<a href="<?php echo $currentPage;?>?orden=1&valor=<?php echo $parametroparaprocesar;?><?php echo $consultaextendidaparaordenacion;?>"><i class="fa fa-angle-double-down"></i></a>
			<?php
}
}

function categoriadesplegablenivel2($padre, $pertenencia = "")
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE refPadre = %s ",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?>
			<option value="<?php echo $row_ConsultaFuncion["idCategoria"];?>"><?php echo $pertenencia.$row_ConsultaFuncion["strNombre_"._idiomaactual];?></option>
			<?php
			 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}


function categoriadesplegablenivel($padre, $pertenencia = "")
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE refPadre = %s ",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?>
			<option value="<?php echo $row_ConsultaFuncion["idCategoria"];?>"><?php echo $pertenencia.$row_ConsultaFuncion["strNombre_"._idiomaactual];?></option>
			<?php
			categoriadesplegablenivel2($row_ConsultaFuncion["idCategoria"], " --");
	 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function categoriadesplegablenivelactualizar($padre, $seleccionado, $pertenencia = "")
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE refPadre = %s ",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?>
			<option value="<?php echo $row_ConsultaFuncion["idCategoria"];?>" <?php if ($seleccionado==$row_ConsultaFuncion["idCategoria"]) echo "selected"; ?>><?php echo $pertenencia.$row_ConsultaFuncion["strNombre_"._idiomaactual];?></option>
			<?php
			categoriadesplegablenivelactualizar2($row_ConsultaFuncion["idCategoria"], $seleccionado, " --");
	 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function categoriadesplegablenivelactualizar2($padre, $seleccionado, $pertenencia = "")
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE refPadre = %s ",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?>
			<option value="<?php echo $row_ConsultaFuncion["idCategoria"];?>" <?php if ($seleccionado==$row_ConsultaFuncion["idCategoria"]) echo "selected"; ?>><?php echo $pertenencia.$row_ConsultaFuncion["strNombre_"._idiomaactual];?></option>
			<?php
			
	 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}


function categorianiveladministracion($padre,  $pertenencia = "")
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE refPadre = %s ",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?>
						<tr>
						<td><?php echo $row_ConsultaFuncion["idCategoria"];?></td>

							<td><?php echo  $pertenencia.$row_ConsultaFuncion["strNombre_"._idiomaactual];?></td>
								<td><?php echo MostrarEstado($row_ConsultaFuncion["intEstado"]);?></td>
								<td><?php echo $row_ConsultaFuncion["intOrden"];?></td>
								<td></td>
							<td><a href="categoria-edit.php?id=<?php echo $row_ConsultaFuncion["idCategoria"];?>" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a> <a href="categoria-delete.php?id=<?php echo $row_ConsultaFuncion["idCategoria"];?>" class="btn btn-danger btn-circle"><i class="fa fa-times-circle "></i></a></td>
						</tr>
			<?php
			categorianiveladministracion($row_ConsultaFuncion["idCategoria"], "-------- ");
	 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}



// BLOQUE RESTRICCION ACCESO POR NIVELES
//MySQLi Fragmentos por http://www.dreamweaver-tutoriales.com
//Copyright Jorge Vila 2015

function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

function RestringirAcceso($acceden)
{
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = $acceden;
$MM_donotCheckaccess = "false";
	
	//Si no está registrado se le tira directamente
	if (!isset($_SESSION['MM_Username']))
		{
		header("Location: index.php"); 
		exit;
	}

$MM_restrictGoTo = "error.php?error=3";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
}

function TieneSubcategorias($padre)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE refPadre = %s AND intEstado=1",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	
		return true;
	else
		return false;
	mysqli_free_result($ConsultaFuncion);
}

function MostrarSubcategorias($padre)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE refPadre = %s AND intEstado=1",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			 if (TieneSubcategorias($row_ConsultaFuncion["idCategoria"]))
				{
			?>
			<li><a href="<?php echo GenerarRutaCategoria($row_ConsultaFuncion["idCategoria"])?>"><?php echo $row_ConsultaFuncion["strNombre_"._idiomaactual];?> </a>
			<ul>
				<?php MostrarSubSubcategorias($row_ConsultaFuncion["idCategoria"]);?>
				</ul>
			</li>
			<?php
				
			}
			else 
			{
			?><li><a href="<?php echo GenerarRutaCategoria($row_ConsultaFuncion["idCategoria"])?>"><?php echo $row_ConsultaFuncion["strNombre_"._idiomaactual];?> </a>
			</li>
			
			<?php
			}
			
	 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function MostrarSubSubcategorias($padre)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE refPadre = %s AND intEstado=1",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			
			?>
			<li><a href="<?php echo GenerarRutaCategoria($row_ConsultaFuncion["idCategoria"])?>"><?php echo $row_ConsultaFuncion["strNombre_"._idiomaactual];?> </a>
			</li>
	<?php
	 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function InicializarConfiguracion()
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblconfiguracion WHERE idConfiguracion = 1");
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		
		define("_logo", $row_ConsultaFuncion["strLogo"]);
		define("_email", $row_ConsultaFuncion["strEmail"]);
		define("_telefono", $row_ConsultaFuncion["strTelefono"]);
		define("_marcas", $row_ConsultaFuncion["intMarcas"]);
		define("_mostrarimpuesto", $row_ConsultaFuncion["intImpuesto"]);
		define("_strPAYPAL_url", $row_ConsultaFuncion["strPAYPAL_url"]);
		define("_strPAYPAL_email", $row_ConsultaFuncion["strPAYPAL_email"]);
		define("_strCAIXA_url", $row_ConsultaFuncion["strCAIXA_url"]);
		define("_strCAIXA_fuc", $row_ConsultaFuncion["strCAIXA_fuc"]);
		define("_strCAIXA_terminal", $row_ConsultaFuncion["strCAIXA_terminal"]);
		define("_strCAIXA_version", $row_ConsultaFuncion["strCAIXA_version"]);
		define("_strCAIXA_clave", $row_ConsultaFuncion["strCAIXA_clave"]);
		define("_strSANTANDER_url", $row_ConsultaFuncion["strSANTANDER_url"]);
		define("_strSANTANDER_merchantid", $row_ConsultaFuncion["strSANTANDER_merchantid"]);
		define("_strSANTANDER_secret", $row_ConsultaFuncion["strSANTANDER_secret"]);
		define("_strSANTANDER_account", $row_ConsultaFuncion["strSANTANDER_account"]);
		define("_intTransferencia", $row_ConsultaFuncion["intTransferencia"]);
		define("_intPaypal", $row_ConsultaFuncion["intPaypal"]);
		define("_intCaixa", $row_ConsultaFuncion["intCaixa"]);
		define("_intSantander", $row_ConsultaFuncion["intSantander"]);
		define("_strURL", $row_ConsultaFuncion["strURL"]);
		define("_dblDescuento", $row_ConsultaFuncion["dblDescuento"]);
		define("_strEmailEnvios", $row_ConsultaFuncion["strEmailEnvios"]);
		define("_strPassEMailEnvios", $row_ConsultaFuncion["strPassEMailEnvios"]);
		define("_strServidorCorreo", $row_ConsultaFuncion["strServidorCorreo"]);
		define("_zonas", $row_ConsultaFuncion["intMostrarZona"]);
		define("_impuestos", $row_ConsultaFuncion["intMostrarZonaImpuesto"]);
		define("_slider", $row_ConsultaFuncion["intMostrarSlider"]);
		define("_western", $row_ConsultaFuncion["intWestern"]);
		define("_money", $row_ConsultaFuncion["intMoneyGram"]);	
		define("_destinocompra", $row_ConsultaFuncion["intDestinoCompra"]);
	}
	mysqli_free_result($ConsultaFuncion);
}

InicializarConfiguracion();
if (isset($_GET["moneda"])) $_SESSION["monedaactiva"]=$_GET["moneda"];
	

function MostrarMarca($idmarca)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblmarca WHERE idMarca = %s",
		 GetSQLValueString($idmarca, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	
		return $row_ConsultaFuncion["strMarca"];
	else
		return "No usado";
	mysqli_free_result($ConsultaFuncion);
}

function categoriadesplegablenivelProductos($padre, $pertenencia = "")
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE refPadre = %s ",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?>
			<option value="<?php echo $row_ConsultaFuncion["idCategoria"];?>"><?php echo $pertenencia.$row_ConsultaFuncion["strNombre_"._idiomaactual];?></option>
			<?php
			categoriadesplegablenivel2Productos($row_ConsultaFuncion["idCategoria"], " --");
	 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function categoriadesplegablenivel2Productos($padre, $pertenencia = "")
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE refPadre = %s ",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?>
			<option value="<?php echo $row_ConsultaFuncion["idCategoria"];?>"><?php echo $pertenencia.$row_ConsultaFuncion["strNombre_"._idiomaactual];?></option>
			<?php
			categoriadesplegablenivel3Productos($row_ConsultaFuncion["idCategoria"], " ----");
			
			 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function categoriadesplegablenivel3Productos($padre, $pertenencia = "")
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE refPadre = %s ",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?>
			<option value="<?php echo $row_ConsultaFuncion["idCategoria"];?>"><?php echo $pertenencia.$row_ConsultaFuncion["strNombre_"._idiomaactual];?></option>
			<?php
		
			 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function ProcesarComaPrecio($precio)
{
	return str_replace(',','.',$precio);
}

function categoriadesplegablenivelProductosEdit($padre, $seleccionado, $pertenencia = "")
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE refPadre = %s ",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?>
			<option value="<?php echo $row_ConsultaFuncion["idCategoria"];?>" <?php if ($seleccionado==$row_ConsultaFuncion["idCategoria"]) echo "selected"; ?>><?php echo $pertenencia.$row_ConsultaFuncion["strNombre_"._idiomaactual];?></option>
			<?php
			categoriadesplegablenivel2ProductosEdit($row_ConsultaFuncion["idCategoria"], $seleccionado, " --");
	 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function categoriadesplegablenivel2ProductosEdit($padre, $seleccionado, $pertenencia = "")
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE refPadre = %s ",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?>
			<option value="<?php echo $row_ConsultaFuncion["idCategoria"];?>" <?php if ($seleccionado==$row_ConsultaFuncion["idCategoria"]) echo "selected"; ?>><?php echo $pertenencia.$row_ConsultaFuncion["strNombre_"._idiomaactual];?></option>
			<?php
			categoriadesplegablenivel3ProductosEdit($row_ConsultaFuncion["idCategoria"], $seleccionado, " ----");
			
			 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function categoriadesplegablenivel3ProductosEdit($padre, $seleccionado, $pertenencia = "")
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE refPadre = %s ",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?>
			<option value="<?php echo $row_ConsultaFuncion["idCategoria"];?>" <?php if ($seleccionado==$row_ConsultaFuncion["idCategoria"]) echo "selected"; ?>><?php echo $pertenencia.$row_ConsultaFuncion["strNombre_"._idiomaactual];?></option>
			<?php
		
			 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function MostrarProducto($id, $tipomuestra=0)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblproducto WHERE idProducto = %s ",
		 GetSQLValueString($id, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	//$linkProducto="producto-detalle.php?id=".$row_ConsultaFuncion["idProducto"];
	$linkProducto=GenerarRutaCategoria($row_ConsultaFuncion["refCategoria1"]).$row_ConsultaFuncion["strSEO_"._idiomaactual].".html";
	
	?>
	
	<div class="product-image-wrapper">
	<div class="single-products">
			<div class="productinfo text-center">
			
			<?php if ($row_ConsultaFuncion["strImagen1"]!=""){?>
			<a href="<?php echo $linkProducto;?>">
	<img src="images/productos/<?php echo $row_ConsultaFuncion["strImagen1"];?>" alt="" id="imagenproducto<?php echo $row_ConsultaFuncion["idProducto"];?>"></a>
	<?php }
	else
	{?>
		<a href="<?php echo $linkProducto;?>"><img src="images/productos/nodisponible.jpg" alt="" id="imagenproducto<?php echo $row_ConsultaFuncion["idProducto"];?>"></a>
	<?php }?>
			
				
				<h2><?php echo CalcularPrecioProducto($row_ConsultaFuncion["idProducto"]); ?></h2>
				<p><?php echo $row_ConsultaFuncion["strNombre_"._idiomaactual]; ?></p>
				<a href="<?php echo $linkProducto;?>" class="btn btn-default add-to-cart"><i class="fa fa-cog"></i><?php echo _T65;?></a>
				
				
				<?php if ($tipomuestra==2){?>
				<br>
				
				<?php 
				MostrarCaracteristicasComparador($row_ConsultaFuncion["idProducto"]);
	}?>
			</div>
			

	</div>
	<div class="choose">
		<ul class="nav nav-pills nav-justified" id="deseolista<?php echo $row_ConsultaFuncion["idProducto"];?>">
		<?php if (isset($_SESSION['tienda2017Front_UserId'])){
			if (!EsYaUnDeseo($row_ConsultaFuncion["idProducto"])){?>
			<li id="deseoli<?php echo $row_ConsultaFuncion["idProducto"];?>"><a href="javascript:void(0);" class="Adeseos" id="deseo<?php echo $row_ConsultaFuncion["idProducto"];?>"><i class="fa fa-plus-square"></i><?php echo _T66;?></a></li>
			<?php
			}
			else
			{
				?>
				<li><a href="usuario-lista-deseos.php" style="color:#FF0004"><i class="fa fa-heart"></i><?php echo _T67;?></a></li>
				
				<?php
			
				}
			 }
			else
			
			{?>
				<li id="deseoli<?php echo $row_ConsultaFuncion["idProducto"];?>"><a title="Debes registrarte para poder guardar tus deseos" href="javascript:void(0);" id="deseo<?php echo $row_ConsultaFuncion["idProducto"];?>"><i class="fa fa-plus-square"></i><?php echo _T66;?></a></li>
				
				<?php
			}?>
			
			<?php
	//BLOQUE COMPARADOR
	
	if (isset($_SESSION['tienda2017Front_UserId'])){
			if (!EsYaUnComparar($row_ConsultaFuncion["idProducto"])){?>
			<li id="compararli<?php echo $row_ConsultaFuncion["idProducto"];?>"><a href="javascript:void(0);" class="AComparar" id="comparar<?php echo $row_ConsultaFuncion["idProducto"];?>"><i class="fa fa-plus-square"></i><?php echo _T68;?></a></li>
			<?php
			}
			else
			{
				?>
				<li><a href="usuario-lista-comparar.php" style="color:#1A53A1"><i class="fa fa-bars "></i><?php echo _T69;?></a></li>
				
				<?php
			
				}
			 }
			else
			
			{?>
				<li id="compararli<?php echo $row_ConsultaFuncion["idProducto"];?>"><a title="Debes registrarte para poder usar el comparador" href="javascript:void(0);" id="comparar<?php echo $row_ConsultaFuncion["idProducto"];?>"><i class="fa fa-bars"></i><?php echo _T68;?></a></li>
				
				<?php
			}?>
			
		</ul>
	</div>
	<?php if ($tipomuestra==1){?>
	<div class="choose">
		<ul class="nav nav-pills nav-justified">
		<li><a href="javascript:void(0);" onClick="javascript:js_EliminaDeseo(<?php echo $row_ConsultaFuncion["idProducto"];?>)"><i class="fa fa-times-circle"></i><?php echo _T70;?></a></li>
		</ul>
	</div>
	<?php }?>
	<?php if ($tipomuestra==2){?>
	<div class="choose">
		<ul class="nav nav-pills nav-justified">
		<li><a href="javascript:void(0);" onClick="javascript:js_EliminaComparar(<?php echo $row_ConsultaFuncion["idProducto"];?>)"><i class="fa fa-times-circle"></i><?php echo _T71;?></a></li>
		</ul>
	</div>
	<?php }?>
</div>
	
	<?php
	
	mysqli_free_result($ConsultaFuncion);
}

function MostrarProductoExtra($id, $tipomuestra=0)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblproducto WHERE idProducto = %s ",
		 GetSQLValueString($id, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	//$linkProducto="producto-detalle.php?id=".$row_ConsultaFuncion["idProducto"];
	$linkProducto=GenerarRutaCategoria($row_ConsultaFuncion["refCategoria1"]).$row_ConsultaFuncion["strSEO_"._idiomaactual].".html";
	
	?>
	
	<div class="product-image-wrapper">
	<div class="single-products">
			<div class="productinfo text-center">
			
			<?php if ($row_ConsultaFuncion["strImagen1"]!=""){?>
			<a href="<?php echo $linkProducto;?>">
	<img src="images/productos/<?php echo $row_ConsultaFuncion["strImagen1"];?>" alt="" id="imagenproducto<?php echo $row_ConsultaFuncion["idProducto"];?>"></a>
	<?php }
	else
	{?>
		<a href="<?php echo $linkProducto;?>"><img src="images/productos/nodisponible.jpg" alt="" id="imagenproducto<?php echo $row_ConsultaFuncion["idProducto"];?>"></a>
	<?php }?>
			
				
				<h2><?php echo CalcularPrecioProducto($row_ConsultaFuncion["idProducto"]); ?></h2>
				<p><?php echo $row_ConsultaFuncion["strNombre_"._idiomaactual]; ?></p>
				<a href="<?php echo $linkProducto;?>" class="btn btn-default add-to-cart"><i class="fa fa-cog"></i><?php echo _T65;?></a>
				

			</div>
			

	</div>
	
	
</div>
	
	<?php
	
	mysqli_free_result($ConsultaFuncion);
}



function Productosdependientes($cat)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT idProducto, strNombre_1 FROM tblproducto WHERE refCategoria1 = %s OR refCategoria2 = %s OR refCategoria3 = %s OR refCategoria4 = %s OR refCategoria5 = %s   ", 
	   GetSQLValueString($cat, "int"),
	   GetSQLValueString($cat, "int"),
	   GetSQLValueString($cat, "int"),
	   GetSQLValueString($cat, "int"),
	   GetSQLValueString($cat, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?><a href="producto-edit.php?id=<?php echo $row_ConsultaFuncion["idProducto"]?>"><?php echo $row_ConsultaFuncion["strNombre_"._idiomaactual];?></a><br>

			
			<?php
			 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function CochesporMarca($marca)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT COUNT(idProducto) AS Total FROM tblproducto WHERE refMarca = %s ", 
	   GetSQLValueString($marca, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["Total"];	
	
	mysqli_free_result($ConsultaFuncion);
}

function CalcularPrecioProducto($producto, $opcion=0)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT dblPrecio, refImpuesto FROM tblproducto WHERE idProducto = %s ", 
	   GetSQLValueString($producto, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	$impuesto=0;
	
	if ($opcion==0)
	{
		if (_mostrarimpuesto==1)
		{
			$datoimpuesto = ObtenerImpuesto($row_ConsultaFuncion["refImpuesto"]);
			$impuesto=($row_ConsultaFuncion["dblPrecio"] *($datoimpuesto/100))*$_SESSION["monedavalor"];
			$impuesto= $impuesto - ($impuesto*(_dblDescuento/100));
																
		}

		return number_format((($row_ConsultaFuncion["dblPrecio"]*$_SESSION["monedavalor"])+$impuesto)-(($row_ConsultaFuncion["dblPrecio"]*$_SESSION["monedavalor"])+$impuesto)*(_dblDescuento/100), 2, ",", "").$_SESSION["monedasimbolo"];	
	}
	
	if ($opcion==1)
	{
		return ($row_ConsultaFuncion["dblPrecio"]*$_SESSION["monedavalor"])-(($row_ConsultaFuncion["dblPrecio"]*$_SESSION["monedavalor"])*(_dblDescuento/100));	
	}
	
	if ($opcion==2)
	{
		if (_mostrarimpuesto==1)
		{
			$datoimpuesto = ObtenerImpuesto($row_ConsultaFuncion["refImpuesto"]);
			$impuesto=($row_ConsultaFuncion["dblPrecio"] *($datoimpuesto/100))*$_SESSION["monedavalor"];
			$impuesto= $impuesto - ($impuesto*(_dblDescuento/100));
																
		}

		return (($row_ConsultaFuncion["dblPrecio"]*$_SESSION["monedavalor"])+$impuesto)-(($row_ConsultaFuncion["dblPrecio"]*$_SESSION["monedavalor"])+$impuesto)*(_dblDescuento/100);		
	}
	
	mysqli_free_result($ConsultaFuncion);
}

function ObtenerImpuesto($idimpuesto)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT dblImpuesto FROM tblimpuesto WHERE idImpuesto = %s ", 
	   GetSQLValueString($idimpuesto, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["dblImpuesto"];	
	
	mysqli_free_result($ConsultaFuncion);
}

function CalcularImpuestoProducto($producto, $opcion=0)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT dblPrecio, refImpuesto FROM tblproducto WHERE idProducto = %s ", 
	   GetSQLValueString($producto, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	$impuesto= ObtenerImpuesto($row_ConsultaFuncion["refImpuesto"]);
	
	if ($opcion==0)
	return number_format(($row_ConsultaFuncion["dblPrecio"]*($impuesto/100))-(($row_ConsultaFuncion["dblPrecio"]*($impuesto/100)*(_dblDescuento/100))), 2, ",", "");	
	
	if ($opcion==1)
	return ($row_ConsultaFuncion["dblPrecio"]*($impuesto/100))-(($row_ConsultaFuncion["dblPrecio"]*($impuesto/100)*(_dblDescuento/100)));	
	
	mysqli_free_result($ConsultaFuncion);
}

function opcionniveladministracion($padre,  $pertenencia = "")
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblopcion WHERE refPadre = %s ",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?>
						<tr>
						<td><?php echo $row_ConsultaFuncion["idOpcion"];?></td>

							<td><?php echo  $pertenencia.$row_ConsultaFuncion["strNombre_"._idiomaactual];?></td>
								<td><?php echo MostrarEstado($row_ConsultaFuncion["intEstado"]);?></td>
								<td><?php echo $row_ConsultaFuncion["intOrden"];?></td>
								<td><?php echo $row_ConsultaFuncion["dblIncremento"];?></td>
							<td><a href="opciondetalle-edit.php?id=<?php echo $row_ConsultaFuncion["idOpcion"];?>" class="btn btn-warning btn-circle" title="Editar Detalle"><i class="fa fa-edit"></i></a> </td>
						</tr>
			<?php
			
	 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function MostrarOpcionProductoEdit($opcion, $producto)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblproductoopcion WHERE refProducto = %s AND refOpcion=%s ",
		 GetSQLValueString($producto, "int"),
		 GetSQLValueString($opcion, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion==0) 
		return '<a title="Vincular" type="button" class="btn btn-error btn-danger" href="productoopcion-add.php?opcion='.$opcion.'&id='.$producto.'"><i class="fa fa-times"></i></a>';
	else return '<a title="Desvincular" type="button" class="btn btn-success btn-circle" href="productoopcion-delete.php?opcion='.$opcion.'&id='.$producto.'"><i class="fa fa-check"></i></a>';
	
	mysqli_free_result($ConsultaFuncion);
}

function CalcularPrecioOpcion($opcion)
{
	global $con;
	
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblopcion WHERE idOpcion=%s ", 
	   GetSQLValueString($opcion, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
	
			return $row_ConsultaFuncion["dblIncremento"];
		}
	mysqli_free_result($ConsultaFuncion);
}

function MostrarValorOpciones($carrito)
{
	global $con;
	
	$total=0;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcarritodetalle WHERE refCarrito=%s ", 
	   GetSQLValueString($carrito, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			$total=$total+CalcularPrecioOpcion($row_ConsultaFuncion["refOpcionSeleccionada"]);

			 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	return $total;
	mysqli_free_result($ConsultaFuncion);
}


function MostrarOpciones($producto)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblproductoopcion WHERE refProducto=%s ", 
	   GetSQLValueString($producto, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			MostrarOpcionesProductoSubopcion($row_ConsultaFuncion["refOpcion"])
			?>
			
		<br>

			
			<?php
			 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function MostrarOpcionesProductoSubopcion($opcion)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblopcion WHERE refPadre=%s AND intEstado=1 ORDER BY intOrden ASC ", 
	   GetSQLValueString($opcion, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		
		echo ObtenerNombreOpcion($opcion);
		?>
		<select name="intOpcion-<?php echo $opcion;?>" class="form-control price-option" id="intOpcion-<?php echo $opcion;?>"  >
				
		<?php
		do { 
			?>
			<option value="<?php echo $row_ConsultaFuncion["idOpcion"]?>" data-price="<?php echo $row_ConsultaFuncion["dblIncremento"]?>"><?php echo $row_ConsultaFuncion["strNombre_"._idiomaactual]?></option>
		
			<?php
			 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		?>
		</select>
		<?php
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function ObtenerNombreOpcion($opcion)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT strNombre_"._idiomaactual." FROM tblopcion WHERE idOpcion = %s",
		 GetSQLValueString($opcion, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	
		return $row_ConsultaFuncion["strNombre_"._idiomaactual];
	else
		return "----";
	mysqli_free_result($ConsultaFuncion);
}

function ObtenerNombreCaracteristica($caracteristica)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT strNombre_"._idiomaactual." FROM tblcaracteristica WHERE idCaracteristica = %s",
		 GetSQLValueString($caracteristica, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	
		return $row_ConsultaFuncion["strNombre_"._idiomaactual];
	else
		return "----";
	mysqli_free_result($ConsultaFuncion);
}

function caracteristicaniveladministracion($padre,  $pertenencia = "")
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcaracteristica WHERE refPadre = %s ",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?>
						<tr>
						<td><?php echo $row_ConsultaFuncion["idCaracteristica"];?></td>

							<td><?php echo  $pertenencia.$row_ConsultaFuncion["strNombre_"._idiomaactual];?></td>
							<td><?php echo MostrarEstado($row_ConsultaFuncion["intEstado"]);?></td>
							<td><?php echo $row_ConsultaFuncion["intOrden"];?></td>
							<td><a href="caracteristicadetalle-edit.php?id=<?php echo $row_ConsultaFuncion["idCaracteristica"];?>" class="btn btn-warning btn-circle" title="Editar Detalle"><i class="fa fa-edit"></i></a> </td>
						</tr>
			<?php
			
	 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function MostrarCaracteristicaProductoEdit($caracteristica, $producto)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcaracteristica WHERE refPadre=%s AND intEstado=1 ORDER BY intOrden ASC ", 
	   GetSQLValueString($caracteristica, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		//echo ObtenerNombreCaracteristica($caracteristica);
		$actual=ObtenerCaracteristicaSeleccionadaProducto($caracteristica, $producto);
		?>
		<select name="intCaracteristica-<?php echo $caracteristica;?>" class="form-control" id="intCaracteristica-<?php echo $caracteristica;?>">
			<option value="0" <?php if ($actual=="0") echo "selected"; ?>>No utilizado</option>
				
		<?php
		do { 
			?>
			<option value="<?php echo $row_ConsultaFuncion["idCaracteristica"]?>" <?php if ($actual==$row_ConsultaFuncion["idCaracteristica"]) echo "selected"; ?>><?php echo $row_ConsultaFuncion["strNombre_"._idiomaactual]?></option>
		
			<?php
			 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		?>
		</select>
		<?php
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function ObtenerCaracteristicaSeleccionadaProducto($caracteristica, $producto)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT refSeleccionada FROM tblproductocaracteristica WHERE refProducto = %s AND refCaracteristica= %s",
		 GetSQLValueString($producto, "int"),
		 GetSQLValueString($caracteristica, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	
		return $row_ConsultaFuncion["refSeleccionada"];
	else
		return "0";
	mysqli_free_result($ConsultaFuncion);
}

function MostrarCaracteristicasFrontEnd($producto)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblproductocaracteristica WHERE refProducto=%s ", 
	   GetSQLValueString($producto, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
		
		echo "<strong>".ObtenerNombreCaracteristica($row_ConsultaFuncion["refCaracteristica"]).": </strong>";
		echo ObtenerNombreCaracteristica($row_ConsultaFuncion["refSeleccionada"]);
			//$actual=ObtenerCaracteristicaSeleccionadaProducto($caracteristica, $producto);
			echo "<br>";
			} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}


function MostrarBreadcrumbs($categoria)
{
	global $con;
	
	$nivel1="";
	$nivel2="";
	$nivel3="";
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE idCategoria = %s",
		 GetSQLValueString($categoria, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($row_ConsultaFuncion["refPadre"]!="0")
	{
		//ES DE SEGUNDO O TERCER NIVEL
		$query_ConsultaFuncion2 = sprintf("SELECT * FROM tblcategoria WHERE idCategoria = %s",
		 GetSQLValueString($row_ConsultaFuncion["refPadre"], "int"));
		//echo $query_ConsultaFuncion;
		$ConsultaFuncion2 = mysqli_query($con,  $query_ConsultaFuncion2) or die(mysqli_error($con));
		$row_ConsultaFuncion2 = mysqli_fetch_assoc($ConsultaFuncion2);
		$totalRows_ConsultaFuncion2 = mysqli_num_rows($ConsultaFuncion2);
		
		if ($row_ConsultaFuncion2["refPadre"]!="0")
		{
			//CONSIDERAMOS NIVEL 3
			$nivel2=$row_ConsultaFuncion2["strNombre_"._idiomaactual];
			$nivel3=$row_ConsultaFuncion["strNombre_"._idiomaactual];
			
			$query_ConsultaFuncion3 = sprintf("SELECT * FROM tblcategoria WHERE idCategoria = %s",
		 GetSQLValueString($row_ConsultaFuncion2["refPadre"], "int"));
		//echo $query_ConsultaFuncion;
		$ConsultaFuncion3 = mysqli_query($con,  $query_ConsultaFuncion3) or die(mysqli_error($con));
		$row_ConsultaFuncion3 = mysqli_fetch_assoc($ConsultaFuncion3);
		$totalRows_ConsultaFuncion3 = mysqli_num_rows($ConsultaFuncion3);
			
			$nivel1=$row_ConsultaFuncion3["strNombre_"._idiomaactual];
			
			
		}
		else
		{
			//CONSIDERAMOS NIVEL 2
			$nivel1=$row_ConsultaFuncion2["strNombre_"._idiomaactual];
			$nivel2=$row_ConsultaFuncion["strNombre_"._idiomaactual];
		}
		
		
		
	}
	else
	{
		//ES DE PRIMER NIVEL
		$nivel1=$row_ConsultaFuncion["strNombre_"._idiomaactual];
	}
	
	?>
	 <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php"><?php echo _T1;?></a></li>
				  <?php if ($nivel1!="") 
					echo '<li >'.$nivel1.'</li>'
					?>
					 <?php if ($nivel2!="") 
					echo '<li >'.$nivel2.'</li>'
					?>
					 <?php if ($nivel3!="") 
					echo '<li >'.$nivel3.'</li>'
					?>
				  
				</ol>
			</div>
	<?php
	
	mysqli_free_result($ConsultaFuncion);
}

function ObtenerNombreUsuario($usuario)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT strNombre FROM tblusuario WHERE idUsuario = %s ",
		 GetSQLValueString($usuario, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["strNombre"];
	
	mysqli_free_result($ConsultaFuncion);
}

function EsYaUnDeseo($producto)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT idDeseo FROM tbldeseo WHERE refUsuario = %s AND refProducto=%s ",
		 GetSQLValueString($_SESSION['tienda2017Front_UserId'], "int"),
		 GetSQLValueString($producto, "int")
									);
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>=1) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

function EsYaUnComparar($producto)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT idComparar FROM tblcomparar WHERE refUsuario = %s AND refProducto=%s ",
		 GetSQLValueString($_SESSION['tienda2017Front_UserId'], "int"),
		 GetSQLValueString($producto, "int")
									);
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>=1) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

function MostrarCaracteristicasComparador($producto)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcaracteristica WHERE intEstado=1 AND refPadre=0 ORDER BY intOrden ASC");
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			echo "<b>".ObtenerNombreCaracteristica($row_ConsultaFuncion["idCaracteristica"])."</b><br>";
			echo ObtenerCaracteristicaSeleccionadaProductoComparador( $row_ConsultaFuncion["idCaracteristica"], $producto);
			
			 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function ObtenerCaracteristicaSeleccionadaProductoComparador($caracteristica, $producto)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT refSeleccionada FROM tblproductocaracteristica WHERE refProducto = %s AND refCaracteristica= %s",
		 GetSQLValueString($producto, "int"),
		 GetSQLValueString($caracteristica, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	
		return ObtenerNombreCaracteristica($row_ConsultaFuncion["refSeleccionada"])."<br>";
	else
		return "--<br>";
	mysqli_free_result($ConsultaFuncion);
}

function InsertarUsuarioTemporal(){
	global $con;
	
	$insertSQL = sprintf("INSERT INTO tblusuario (strNombre, strEmail, intEstado, strPassword, fchAlta) VALUES (%s, %s, %s, %s, NOW())",
                       GetSQLValueString("", "text"),
                       GetSQLValueString("", "text"),
                       GetSQLValueString(1, "int"),
                       GetSQLValueString("", "text"));
  $Result1 = mysqli_query($con, $insertSQL) or die(mysqli_error($con));
  return mysqli_insert_id($con);
}

function ImportarCarritoTemporal($valortemporal)
{
	
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT idContador FROM tblcarrito WHERE tblcarrito.refUsuario = %s AND tblcarrito.intTransaccionEfectuada = 0", GetSQLValueString($_SESSION['MM2_Temporal'], "int"));
	$ConsultaFuncion = mysqli_query($con, $query_ConsultaFuncion) or die(mysqli_error());
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	if ($totalRows_ConsultaFuncion>0){
		do{
		
		$updateSQL = sprintf("UPDATE tblcarrito SET refUsuario=%s WHERE idContador=%s AND intTransaccionEfectuada = 0",         $valortemporal, $row_ConsultaFuncion["idContador"]);
  
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
		
		} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion));
	}
	}

function AgregarOpcionesaCarrito($idcarrito, $producto)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblopcion WHERE intEstado=1 AND refPadre=0 ");
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			//BUSCO SOBRE tblproductoopcion para ver si tiene esa opcion activada
			
			$query_ConsultaOpcion = sprintf("SELECT * FROM tblproductoopcion WHERE refProducto=%s AND refOpcion=%s", 
					$producto,
					$row_ConsultaFuncion["idOpcion"]);
			//echo $query_ConsultaOpcion;
			$ConsultaOpcion = mysqli_query($con,  $query_ConsultaOpcion) or die(mysqli_error($con));
			$row_ConsultaOpcion = mysqli_fetch_assoc($ConsultaOpcion);
			$totalRows_ConsultaOpcion = mysqli_num_rows($ConsultaOpcion);
			
			//SI EXISTE COMO OPCION, HAY QUE AGREGARLA A LA TABLA RELACIONADA
			if ($totalRows_ConsultaOpcion==1)
				AgregarOpcionAProducto($idcarrito, $row_ConsultaFuncion["idOpcion"]);
			
			 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function AgregarOpcionAProducto($idcarrito, $opcion){
	global $con;
	
	$insertSQL = sprintf("INSERT INTO tblcarritodetalle (refCarrito, refOpcion, refOpcionseleccionada) VALUES (%s, %s, %s)",
                       GetSQLValueString($idcarrito, "int"),
                       GetSQLValueString($opcion, "int"),
                       GetSQLValueString($_POST["intOpcion-".$opcion], "int"));
  $Result1 = mysqli_query($con, $insertSQL) or die(mysqli_error($con));
}

function comprobarexistencia($idproducto, $idusuario)
{

	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcarrito WHERE refUsuario = %s AND refProducto=%s AND intTransaccionEfectuada = 0", $idusuario,$idproducto );
	$ConsultaFuncion = mysqli_query($con, $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion >0) 
	{
		do{
		$valor=ComprobarOpcionesdeCarrito($idproducto, $row_ConsultaFuncion["idContador"]);
		//EL PRODUCTO YA EXISTE EN EL CARRITO PENDIENTE, HAY QUE COMPROBAR QUE LAS OPCIONES SON LAS MISMAS
		if ($valor==1){
			return $row_ConsultaFuncion["idContador"];
			exit;
		}
		 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
	}
	else
	return 0;
	mysqli_free_result($ConsultaFuncion);
}

function ComprobarOpcionesdeCarrito($producto, $idcompra)
{
	global $con;
	
	$coincide=1;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblopcion WHERE intEstado=1 AND refPadre=0 ");
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			//BUSCO SOBRE tblproductoopcion para ver si tiene esa opcion activada
			
			$query_ConsultaOpcion = sprintf("SELECT * FROM tblproductoopcion WHERE refProducto=%s AND refOpcion=%s", 
					$producto,
					$row_ConsultaFuncion["idOpcion"]);
			//echo $query_ConsultaOpcion;
			$ConsultaOpcion = mysqli_query($con,  $query_ConsultaOpcion) or die(mysqli_error($con));
			$row_ConsultaOpcion = mysqli_fetch_assoc($ConsultaOpcion);
			$totalRows_ConsultaOpcion = mysqli_num_rows($ConsultaOpcion);
			
			//SI EXISTE COMO OPCION, HAY QUE COMPROBAR SI TIENE EL MISMO VALOR QUE LA QUE ESTAMOS INTENTANDO INSERTAR
			if ($totalRows_ConsultaOpcion==1)
			{
				
				$query_ConsultaOpcion2 = sprintf("SELECT * FROM tblcarritodetalle WHERE refCarrito=%s AND refOpcion=%s", 
					$idcompra,
					$row_ConsultaFuncion["idOpcion"]);
			//echo $query_ConsultaOpcion;
			$ConsultaOpcion2 = mysqli_query($con,  $query_ConsultaOpcion2) or die(mysqli_error($con));
			$row_ConsultaOpcion2 = mysqli_fetch_assoc($ConsultaOpcion2);
			$totalRows_ConsultaOpcion2 = mysqli_num_rows($ConsultaOpcion2);
				
			$seleccionada=$row_ConsultaOpcion2["refOpcionSeleccionada"];
				if ($seleccionada!=$_POST["intOpcion-".$row_ConsultaFuncion["idOpcion"]])
				//if ($seleccionada!=strstr($_POST["intOpcion-".$row_ConsultaFuncion["idOpcion"]], "|", true))
				 {
					$coincide=0;
				 }

			}
	
				//AgregarOpcionAProducto($idcarrito, $row_ConsultaFuncion["idOpcion"]);
			
			 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	
	mysqli_free_result($ConsultaFuncion);
	return $coincide;
}

function MostrarOpcionesProductoCarrito($LineaCarrito)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcarritodetalle WHERE refCarrito=%s ", 
	   GetSQLValueString($LineaCarrito, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	$respuesta="";
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			$respuesta.= ObtenerNombreOpcion($row_ConsultaFuncion["refOpcion"]).": ";
			$respuesta.= ObtenerNombreOpcion($row_ConsultaFuncion["refOpcionSeleccionada"]);
		
			$respuesta.='<br>';
			
			 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
	return $respuesta;
}

function MostrarCantidadCarrito()
{
	global $con;
	
	if ((isset($_SESSION['tienda2017Front_UserId'])) || (isset($_SESSION['MM2_Temporal'])))
	{
		if ($_SESSION['MM2_Temporal']=="ELEVADO")
		$usuariotempoactivo=$_SESSION['tienda2017Front_UserId'];
		else
		$usuariotempoactivo=$_SESSION['MM2_Temporal'];
	}
	
	$query_ConsultaFuncion = sprintf("SELECT SUM(intCantidad) AS Total FROM tblcarrito WHERE refUsuario = %s AND intTransaccionEfectuada=0 ", 
	   GetSQLValueString($usuariotempoactivo, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	echo "(".$row_ConsultaFuncion["Total"].")";	
	
	mysqli_free_result($ConsultaFuncion);
}

function zonaniveladministracion($padre,  $pertenencia = "")
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblzona WHERE refPadre = %s ",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?>
						<tr>
						<td><?php echo $row_ConsultaFuncion["idZona"];?></td>

							<td><?php echo  $pertenencia.$row_ConsultaFuncion["strNombre_"._idiomaactual];?></td>
								<td><?php echo MostrarEstado($row_ConsultaFuncion["intEstado"]);?></td>
								<td><?php echo $row_ConsultaFuncion["dblInferior"];?></td>
								<td><?php echo $row_ConsultaFuncion["dblSuperior"];?></td>
								<td><?php echo $row_ConsultaFuncion["dblCoste"];?></td>
							<td><a href="zonadetalle-edit.php?id=<?php echo $row_ConsultaFuncion["idZona"];?>" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a> </td>
						</tr>
			<?php
			
	 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}

function gruponiveladministracion($padre,  $pertenencia = "")
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblpreciogrupo WHERE refPadre = %s ",
		 GetSQLValueString($padre, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			?>
						<tr>
						<td><?php echo $row_ConsultaFuncion["idGrupo"];?></td>

							<td><?php echo  $pertenencia.$row_ConsultaFuncion["strNombre_"._idiomaactual];?></td>
								<td><?php echo MostrarEstado($row_ConsultaFuncion["intEstado"]);?></td>
								<td><?php echo $row_ConsultaFuncion["dblInferior"];?></td>
								<td><?php echo $row_ConsultaFuncion["dblSuperior"];?></td>
								<td><?php echo $row_ConsultaFuncion["dblCoste"];?></td>
							<td><a href="grupodetalle-edit.php?id=<?php echo $row_ConsultaFuncion["idGrupo"];?>" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a> </td>
						</tr>
			<?php
			
	 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
}


function BloqueMonedas()
{
	global $con;
	
	if (!isset($_SESSION["monedaactiva"]))
	{
	
		$query_ConsultaFuncion = sprintf("SELECT * FROM tblmoneda WHERE intPrincipal = 1 ");
		$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
		$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
		$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
		
		$_SESSION["monedaactiva"]=$row_ConsultaFuncion["idMoneda"];
		$_SESSION["monedasimbolo"]=$row_ConsultaFuncion["strSimbolo"];
		$_SESSION["monedavalor"]=$row_ConsultaFuncion["dblValor"];
		$_SESSION["monedaHTML"]=$row_ConsultaFuncion["strHTML"];
		
	}
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblmoneda WHERE idMoneda=%s ", $_SESSION["monedaactiva"]);
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	$_SESSION["monedasimbolo"]=$row_ConsultaFuncion["strSimbolo"];
	$_SESSION["monedavalor"]=$row_ConsultaFuncion["dblValor"];
	$_SESSION["monedaHTML"]=$row_ConsultaFuncion["strHTML"];
	
	?>
	<div class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
	<?php echo $row_ConsultaFuncion["strNombre"];?>
	<span class="caret"></span>
</button>


	<?php 
	
	$query_ConsultaFuncion2 = sprintf("SELECT * FROM tblmoneda WHERE idMoneda<>%s ORDER BY strNombre ASC", $_SESSION["monedaactiva"]);
	$ConsultaFuncion2 = mysqli_query($con,  $query_ConsultaFuncion2) or die(mysqli_error($con));
	$row_ConsultaFuncion2 = mysqli_fetch_assoc($ConsultaFuncion2);
	$totalRows_ConsultaFuncion2 = mysqli_num_rows($ConsultaFuncion2);
	
	if ($totalRows_ConsultaFuncion2>0){
		?>
		<ul class="dropdown-menu">
		<?php
	do { ?>
											
			<li><a href="index.php?moneda=<?php echo $row_ConsultaFuncion2["idMoneda"];?>"><?php echo $row_ConsultaFuncion2["strNombre"];?></a></li>
				
								<?php

	} while ($row_ConsultaFuncion2 = mysqli_fetch_assoc($ConsultaFuncion2)); 
		?>
			</ul>
							
		<?php
	}	
	?>
	</div>	
	<?php
}

function CalcularPortes($peso, $zona)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblzona WHERE refPadre = %s ",
		 GetSQLValueString($zona, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	$coste=0;
	
	if ($totalRows_ConsultaFuncion>0)	{
		do { 
			if (($peso>$row_ConsultaFuncion["dblInferior"]) && ($peso<=$row_ConsultaFuncion["dblSuperior"]))
				$coste=$row_ConsultaFuncion["dblCoste"]*$_SESSION["monedavalor"];
			
			 } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
		
	}
	mysqli_free_result($ConsultaFuncion);
	return $coste;
}

function CalcularImpuestosZona($precio, $zonaimpuesto)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblzonaimpuesto WHERE idZonaImpuesto = %s ",
		 GetSQLValueString($zonaimpuesto, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	$coste=0;
	
	if ($totalRows_ConsultaFuncion>0)	{
		$coste=$precio*($row_ConsultaFuncion["dblCoste"]/100);
		
	}
	mysqli_free_result($ConsultaFuncion);
	return $coste;
}

function ConfirmacionPago($tipopago, $estado)
{

	global $con;
	
//$_SESSION["usuariotempoactivo"]
	//$_SESSION["Total"]=$_SESSION["PrecioFinal"]+$_SESSION["PrecioFinal"]*$iva;
	
	$insertSQL = sprintf("INSERT INTO tblcompra (idUsuario, fchCompra, intTipoPago, dblTotalIVA, dblTotalsinIVA, intFacturacion, intEnvio, intEstado, intZona, strNombre, strDireccion, strProvincia, strPais, strCP, strEmail, strTelefono, refMoneda) VALUES (%s, NOW(), %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_SESSION["usuariotempoactivo"], "int"),
					   $tipopago,
					   GetSQLValueString($_SESSION["Total"], "double"),					   GetSQLValueString($_SESSION["TotalsinImpuestos"], "double"),
					   0,
					   0,
					   $estado,
						$_SESSION["COMPRA_intZona"],					GetSQLValueString($_SESSION["COMPRA_strNombre"] , "text"),
						GetSQLValueString($_SESSION["COMPRA_strDireccion"]  , "text"),
						GetSQLValueString($_SESSION["COMPRA_strProvincia"] , "text"),
						GetSQLValueString($_SESSION["COMPRA_strPais"] , "text"),
						GetSQLValueString($_SESSION["COMPRA_strCP"]  , "text"),
						GetSQLValueString($_SESSION["COMPRA_strEmail"]  , "text"),
						GetSQLValueString($_SESSION["COMPRA_strTelefono"] , "text"),
						GetSQLValueString($_SESSION["monedaactiva"] , "int")
						);
	//echo $insertSQL;
  $Result1 = mysqli_query($con, $insertSQL) or die(mysqli_error($con));
  $ultimacompra = mysqli_insert_id($con);
  $_SESSION["compraactivavisa"] = $ultimacompra;
  ActualizacionCarrito($ultimacompra);
  ActualizaPrecioenCarritoProducto($ultimacompra);
  //ActualizacionStock($ultimacompra);
  
}

function ActualizacionCarrito($idCompra)
{
	
	global $con;
	
		
		$updateSQL = sprintf("UPDATE tblcarrito SET intTransaccionEfectuada=%s WHERE refUsuario=%s AND intTransaccionEfectuada = 0", 
							 $idCompra,
							 $_SESSION["usuariotempoactivo"]);
  
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
	}

function comprobarseonoexiste($strSEO, $idioma)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT strSEO_".$idioma." FROM tblproducto WHERE strSEO_".$idioma." = %s ",
		 GetSQLValueString($strSEO, "text"));
	echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if (($totalRows_ConsultaFuncion==0) || ($strSEO==""))
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

function comprobarseounico($idactual, $strSEO, $idioma)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT strSEO_".$idioma." FROM tblproducto WHERE strSEO_".$idioma." = %s AND idProducto <> %s ",
		 GetSQLValueString($strSEO, "text"),
		 GetSQLValueString($idactual, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if (($totalRows_ConsultaFuncion==0)  || ($strSEO==""))
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

function comprobarseocategorianoexiste($strSEO, $idioma)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT strSEO_".$idioma." FROM tblcategoria WHERE strSEO_".$idioma." = %s ",
		 GetSQLValueString($strSEO, "text"));
	echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if (($totalRows_ConsultaFuncion==0) || ($strSEO=""))
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

function comprobarseocategoriaunico($idactual, $strSEO, $idioma)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT strSEO_".$idioma." FROM tblcategoria WHERE strSEO_".$idioma." = %s AND idCategoria <> %s ",
		 GetSQLValueString($strSEO, "text"),
		 GetSQLValueString($idactual, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if (($totalRows_ConsultaFuncion==0)  || ($strSEO=""))
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

function GenerarRutaCategoria($categoria)
{
	global $con;
	
	$nivel1="";
	$nivel2="";
	$nivel3="";
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE idCategoria = %s",
		 GetSQLValueString($categoria, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($row_ConsultaFuncion["refPadre"]!="0")
	{
		//ES DE SEGUNDO O TERCER NIVEL
		$query_ConsultaFuncion2 = sprintf("SELECT * FROM tblcategoria WHERE idCategoria = %s",
		 GetSQLValueString($row_ConsultaFuncion["refPadre"], "int"));
		//echo $query_ConsultaFuncion;
		$ConsultaFuncion2 = mysqli_query($con,  $query_ConsultaFuncion2) or die(mysqli_error($con));
		$row_ConsultaFuncion2 = mysqli_fetch_assoc($ConsultaFuncion2);
		$totalRows_ConsultaFuncion2 = mysqli_num_rows($ConsultaFuncion2);
		
		if ($row_ConsultaFuncion2["refPadre"]!="0")
		{
			//CONSIDERAMOS NIVEL 3
			$nivel2=$row_ConsultaFuncion2["strSEO_"._idiomaactual];
			$nivel3=$row_ConsultaFuncion["strSEO_"._idiomaactual];
			
			$query_ConsultaFuncion3 = sprintf("SELECT * FROM tblcategoria WHERE idCategoria = %s",
		 GetSQLValueString($row_ConsultaFuncion2["refPadre"], "int"));
		//echo $query_ConsultaFuncion;
		$ConsultaFuncion3 = mysqli_query($con,  $query_ConsultaFuncion3) or die(mysqli_error($con));
		$row_ConsultaFuncion3 = mysqli_fetch_assoc($ConsultaFuncion3);
		$totalRows_ConsultaFuncion3 = mysqli_num_rows($ConsultaFuncion3);
			
			$nivel1=$row_ConsultaFuncion3["strSEO_"._idiomaactual];
			
			
		}
		else
		{
			//CONSIDERAMOS NIVEL 2
			$nivel1=$row_ConsultaFuncion2["strSEO_"._idiomaactual];
			$nivel2=$row_ConsultaFuncion["strSEO_"._idiomaactual];
		}
		
		
		
	}
	else
	{
		//ES DE PRIMER NIVEL
		$nivel1=$row_ConsultaFuncion["strSEO_"._idiomaactual];
	}
	
	
	$rutacompleta="";
	if ($nivel1!="") 
	$rutacompleta=$nivel1.'/';
	 if ($nivel2!="") 
	$rutacompleta=$rutacompleta.$nivel2.'/';
	if ($nivel3!="") 
	$rutacompleta=$rutacompleta.$nivel3.'/';
					
	return $rutacompleta;
	mysqli_free_result($ConsultaFuncion);
}

function InsertarVisitaProducto($producto, $usuario){
	global $con;
	
	$insertSQL = sprintf("INSERT INTO tblproductovisita (refUsuario, refProducto) VALUES (%s, %s)",
                       GetSQLValueString($usuario, "int"),
                       GetSQLValueString($producto, "int"));
  $Result1 = mysqli_query($con, $insertSQL) or die(mysqli_error($con));
  return mysqli_insert_id($con);
}

function DateToHumano($Fecha) 
{ 
$Parte1 = substr($Fecha, 0, 10);
$Parte2 = substr($Fecha, 10, 18);

if ($Parte1<>""){ 
   $trozos=explode("-",$Parte1,3); 
   return $trozos[2]."/".$trozos[1]."/".$trozos[0]; } 
else 
   {return "NULL";} 
} 
function HoraToHumano($Fecha) 
{ 
$Parte1 = substr($Fecha, 0, 10);
$Parte2 = substr($Fecha, 10, 18);

   return $Parte2;

} 

function MostrarNombreProducto($producto)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT strNombre_1 FROM tblproducto WHERE idProducto = %s",
		 GetSQLValueString($producto, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	
		return $row_ConsultaFuncion["strNombre_"._idiomaactual];
	else
		return "-";
	mysqli_free_result($ConsultaFuncion);
}

function ObtenerComentariosPendientes()
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT COUNT(idComentario) AS Total FROM tblcomentario WHERE intEstado = 0 ");
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["Total"];	
	
	mysqli_free_result($ConsultaFuncion);
}

function ObtenerComentariosTotales($producto)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT COUNT(idComentario) AS Total FROM tblcomentario WHERE intEstado = 1 AND refProducto=%s ", $producto);
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["Total"];	
	
	mysqli_free_result($ConsultaFuncion);
}

function MostrarPreciosGrupo($idgrupo)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblpreciogrupo WHERE refPadre = %s ",
		 GetSQLValueString($idgrupo, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	
	if ($totalRows_ConsultaFuncion>0)	{
		?>
		<span class="preciosgrupo">
                                <strong>Atención</strong><br>
		<?php
		do { 
			?>
			
 - De <?php echo $row_ConsultaFuncion["dblInferior"];?> a <?php if ($row_ConsultaFuncion["dblSuperior"]==1000000) echo "la cantidad que elija de"; else echo $row_ConsultaFuncion["dblSuperior"]; ?> unidades: <?php echo $row_ConsultaFuncion["dblCoste"];?>% de descuento<br>
									
			
			<?php

	} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
					  
					  ?>
					  </span><br>
					  <?php
		
	}
	mysqli_free_result($ConsultaFuncion);
	
}


	
function CalcularDescuentoCantidad($idProducto, $cantidad, $refGrupo)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblpreciogrupo WHERE refPadre = %s ",
		 GetSQLValueString($refGrupo, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	
	if ($totalRows_ConsultaFuncion>0)	{
		$descuento=0;

		do { 
			if (($cantidad>=$row_ConsultaFuncion["dblInferior"]) && ($cantidad<=$row_ConsultaFuncion["dblSuperior"]))
				$descuento=$row_ConsultaFuncion["dblCoste"];

	} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 

	}
	mysqli_free_result($ConsultaFuncion);
	return $descuento;
	
}

function BloqueIdiomas()
{
	global $con;
	

		$query_ConsultaFuncion = sprintf("SELECT * FROM tblidioma WHERE idIdioma =  "._idiomaactual);
		$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
		$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
		$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
		
	
	?>
	<div class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
	<?php echo $row_ConsultaFuncion["strIdioma"];?>
	<span class="caret"></span>
</button>


	<?php 
	
	$query_ConsultaFuncion2 = sprintf("SELECT * FROM tblidioma WHERE idIdioma<>%s AND strIdioma<>'' ORDER BY strIdioma ASC", _idiomaactual);
	$ConsultaFuncion2 = mysqli_query($con,  $query_ConsultaFuncion2) or die(mysqli_error($con));
	$row_ConsultaFuncion2 = mysqli_fetch_assoc($ConsultaFuncion2);
	$totalRows_ConsultaFuncion2 = mysqli_num_rows($ConsultaFuncion2);
	
	if ($totalRows_ConsultaFuncion2>0){
		?>
		<ul class="dropdown-menu">
		<?php
	do { ?>
											
			<li><a href="index.php?idioma=<?php echo $row_ConsultaFuncion2["idIdioma"];?>"><?php echo $row_ConsultaFuncion2["strIdioma"];?></a></li>
				
								<?php

	} while ($row_ConsultaFuncion2 = mysqli_fetch_assoc($ConsultaFuncion2)); 
		?>
			</ul>
							
		<?php
	}	
	?>
	</div>
	<?php
}

function ObtenerCodificacionMoneda()
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT strCodificacion FROM tblmoneda WHERE idMoneda = %s",
		 GetSQLValueString($_SESSION["monedaactiva"], "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0)	
		return $row_ConsultaFuncion["strCodificacion"];
	else
		return "-";
	mysqli_free_result($ConsultaFuncion);
}

function mail_cabecera()
{
	$contenido='<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Correo</title>
</head>

<body>
<table width="100%" border="0" cellspacing="5" cellpadding="10">
  <tbody>
    <tr>
      <td><img src="'._strURL.'/images/'._logo.'"  alt=""/></td>
    </tr>
    <tr>
      <td>';
	return $contenido;
}
function mail_pie()
{
	$contenido='</td>
    </tr>
    <tr>
      <td><span style="font-size:10px">Este correo y cualquier fichero adjunto pueden contener información confidencial y dirigirse exclusivamente a su destinatario. Si Vd. no es el destinatario, por favor, elimínelo y notifíquelo al remitente | This email and any files transmitted with it may be confidential and intended solely for the use of the individual or entity to whom they are addressed. Antes de imprimir este mensaje, por favor compruebe que es verdaderamente necesario.</span></td>
    </tr>
  </tbody>
</table>
</body>
</html>';
	return $contenido;
}

function EnvioCorreoHTML($destinatario, $contenido, $asunto, $concopia=0)
{

	$mensaje = mail_cabecera();
	$mensaje.= $contenido;
	$mensaje.=mail_pie();;

	// Para enviar correo HTML, la cabecera Content-type debe definirse
	
	$cabeceras  = 'MIME-Version: 1.0' . "\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\n";
	
	// Cabeceras adicionales
	$cabeceras .= 'From: '._strEmailEnvios.'\n';

		
	
	//$cabeceras .= 'Bcc: info@tiendazapatos.com' . "\n";
	
	// Enviarlo
	//mail($destinatario, $asunto, $mensaje, $cabeceras);
	//echo $mensaje;
	
include("includes/class.phpmailer.php");
include("includes/class.smtp.php");


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
//$mail->SMTPSecure = "ssl";

$mail->Host = _strServidorCorreo;
$mail->Port = 25;
$mail->Username = _strEmailEnvios;
$mail->Password = _strPassEMailEnvios;

$mail->From = _strEmailEnvios;
$mail->FromName = "Tienda Dreamweaver";
$mail->Subject = $asunto;
$mail->AltBody = "Mensaje de aviso de compra";
$mail->MsgHTML(utf8_decode($mensaje));
//$mail->MsgHTML($mensaje);
	
	//$mail->MsgHTML($mensaje);
	//$mail->MsgHTML(iconv("UTF-8", "CP1252", $data));
	
	


$mail->AddAddress($destinatario);
	if ($concopia==1) $mail->AddBCC(_email, "Copia");
$mail->IsHTML(true);


if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
  //echo "Mensaje enviado a ".$destinatario;
}
	
}

function GenerarEmailCliente($tipo)
{
	
	global $con;
	
	//Consulta Cliente
	$query_DatosCliente = sprintf("SELECT * FROM tblusuario WHERE idUsuario = %s ", $_SESSION['usuariotempoactivo']);
	//echo $query_DatosCliente;
	$DatosCliente = mysqli_query($con, $query_DatosCliente) or die(mysqli_error($con));
	$row_DatosCliente = mysqli_fetch_assoc($DatosCliente);
	$totalRows_DatosCliente = mysqli_num_rows($DatosCliente);

//Consulta Pedido
	$query_DatosPedido = sprintf("SELECT * FROM tblcompra WHERE idCompra = %s ", $_SESSION["compraactivavisa"]);
	//echo $query_DatosPedido;
	$DatosPedido = mysqli_query($con, $query_DatosPedido) or die(mysqli_error($con));
	$row_DatosPedido = mysqli_fetch_assoc($DatosPedido);
	$totalRows_DatosPedido = mysqli_num_rows($DatosPedido);

$direccionenvio=_T51." ".$row_DatosPedido["strNombre"].'<br>
'._T52." ".$row_DatosPedido["strDireccion"].'<br>
'._T53." ".$row_DatosPedido["strProvincia"].'<br>
'._T54." ".$row_DatosPedido["strPais"].'<br>
'._T55." ".$row_DatosPedido["strCP"].'<br>
'._T56." ".$row_DatosPedido["strEmail"].'<br>
'._T57." ".$row_DatosPedido["strTelefono"].'<br><br>';
	
if ($tipo==1) $textotipopago=_T81;
if ($tipo==2) $textotipopago=_T82;
if ($tipo==3) $textotipopago=_T83;
if ($tipo==4) $textotipopago=_T84;
if ($tipo==5) $textotipopago=_T10003;
if ($tipo==6) $textotipopago=_T10004;
	
	
	
	
	$listaproductos=ListaProductosParaEmail($row_DatosPedido["idCompra"]);
	
	$mensajeTotal=$direccionenvio.'<br><br>'.$textotipopago.$listaproductos;
	
	return $mensajeTotal;
	
}


function ListaProductosParaEmail($transaccion)
{
	
	global $con;
	
	$query_DatosCarritoFinal = sprintf("SELECT * FROM tblcarrito WHERE  tblcarrito.intTransaccionEfectuada = %s",  $transaccion);
	//echo $query_DatosCarritoFinal;
	$DatosCarritoFinal = mysqli_query($con, $query_DatosCarritoFinal) or die(mysqli_error($con));
	$row_DatosCarritoFinal = mysqli_fetch_assoc($DatosCarritoFinal);
	$totalRows_DatosCarritoFinal = mysqli_num_rows($DatosCarritoFinal);
	
	$preciofinal=0;
	
	$htmlprocesado=' <table width="100%" border="0" cellspacing="5" cellpadding="10">
  <tbody>';
	
	 do { 
		 
		 //DATOS PRODUCTO INDIVIDUAL
		 
		 $query_DatosCarritoContenido = sprintf("SELECT * FROM tblproducto WHERE idProducto = %s ", $row_DatosCarritoFinal["refProducto"]);
	//echo $query_DatosCarritoContenido;
		$DatosCarritoContenido = mysqli_query($con, $query_DatosCarritoContenido) or die(mysqli_error($con));
		$row_DatosCarritoContenido = mysqli_fetch_assoc($DatosCarritoContenido);
		$totalRows_DatosCarritoContenido = mysqli_num_rows($DatosCarritoContenido);
		 
		 $linkProducto=_strURL."/".GenerarRutaCategoria($row_DatosCarritoContenido["refCategoria1"]).$row_DatosCarritoContenido["strSEO_"._idiomaactual].".html";
	
	?>
		
			<?php 
		 $bloqueimagen="";
		 if ($row_DatosCarritoContenido["strImagen1"]!=""){
			 $bloqueimagen='<a href="'.$linkProducto.'">
	<img src="'._strURL.'/images/productos/'.$row_DatosCarritoContenido["strImagen1"].'" width="50px" ></a>';
	 }
	else
	{
		$bloqueimagen='<a href="'.$linkProducto.'"><img src="'._strURL.'/images/productos/nodisponible.jpg" width="50px" ></a>';
 }

		 $htmlprocesado.='<tr><td bgcolor="#fe980f"></td><td bgcolor="#fe980f">'._T44.'</td><td bgcolor="#fe980f">'._T47.'</td><td bgcolor="#fe980f">'._T48.'</td>';
		 
		 $htmlprocesado.='<tr>';
		 $htmlprocesado.='<td>'.$bloqueimagen.'</td>';
		 $htmlprocesado.='<td>'.$row_DatosCarritoContenido["strNombre_"._idiomaactual].'<br>'. MostrarOpcionesProductoCarrito($row_DatosCarritoFinal["idContador"]).'</td>';
		 $htmlprocesado.='<td>'.$row_DatosCarritoFinal["intCantidad"].'</td>';
		 $htmlprocesado.='<td>'.number_format($row_DatosCarritoFinal["dblTotalProducto"], 2, ',', '').' '.$_SESSION["monedaHTML"].'</td>';
		 
		 $htmlprocesado.='</tr>';
		 
		 } while ($row_DatosCarritoFinal = mysqli_fetch_assoc($DatosCarritoFinal)); 
		 
		 $htmlprocesado.= '</tbody></table>';
	
	//APARTADO DE TOTALES
	$htmlprocesado.= '<table width="100%" border="0" cellspacing="5" cellpadding="10">
     <tbody>
       <tr>
         <td width="61%">&nbsp;</td>
         <td width="23%">'._T62.'</td>
         <td width="16%">'.number_format($_SESSION["TotalsinImpuestos"], 2, ',', '').' '.$_SESSION["monedaHTML"].'</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>'._T46.'</td>
         <td>'.number_format($_SESSION["Impuestos"], 2, ',', '').' '.$_SESSION["monedaHTML"].'</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>'._T63.'</td>
         <td>'.number_format($_SESSION["Portes"], 2, ',', '').' '.$_SESSION["monedaHTML"].'</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>'._T48.'</td>
         <td>'.number_format($_SESSION["Total"], 2, ',', '').' '.$_SESSION["monedaHTML"].'</td>
       </tr>
     </tbody>
   </table>';
		 
		 return $htmlprocesado;
}

function ObtenerCorreo($id)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT strEmail FROM tblusuario WHERE idUsuario=%s",GetSQLValueString($id, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["strEmail"];
	mysqli_free_result($ConsultaFuncion);
}

function ActualizaPrecioenCarritoProducto($contador)
{
	
	global $con;
	
	$query_DatosCarritoFinal = sprintf("SELECT * FROM tblcarrito WHERE  tblcarrito.intTransaccionEfectuada = %s",  $contador);
	//echo $query_DatosCarritoFinal;
	$DatosCarritoFinal = mysqli_query($con, $query_DatosCarritoFinal) or die(mysqli_error($con));
	$row_DatosCarritoFinal = mysqli_fetch_assoc($DatosCarritoFinal);
	$totalRows_DatosCarritoFinal = mysqli_num_rows($DatosCarritoFinal);
	
	//ACTUALIZAMOS LOS PRECIOS EN EL CARRITO DE LA COMPRA YA REALIZADA
	do {
		
		$updateSQL = sprintf("UPDATE tblcarrito SET dblTotalProducto=%s WHERE idContador=%s AND intTransaccionEfectuada = %s", 
							 GetSQLValueString($_SESSION["carrito_producto_".$row_DatosCarritoFinal["idContador"]], "double"),
							 $row_DatosCarritoFinal["idContador"],
							 $contador);
  
  		$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
		
		
		
		 } while ($row_DatosCarritoFinal = mysqli_fetch_assoc($DatosCarritoFinal)); 

}

function GuardarEmailEnviado($id, $contenido)
{
	
	
	global $con;
	$updateSQL = sprintf("UPDATE tblcompra SET txtEmail=%s WHERE idCompra=%s ",
                       GetSQLValueString($contenido, "text"),$id);
  
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

}

function DateToQuotedMySQLDate($Fecha) 
{ 
$Parte1 = substr($Fecha, 0, 10);
$Parte2 = substr($Fecha, 10, 18);

if ($Parte1<>""){ 
   $trozos=explode("/",$Parte1,3); 
   return $trozos[2]."-".$trozos[1]."-".$trozos[0].$Parte2; } 
else 
   {return "NULL";} 
} 


//MySQLi Fragmentos por http://www.dreamweaver-tutoriales.com
//Copyright Jorge Vila 2015

if ((!isset($_SESSION['tienda2017Front_UserId'])) || (!$_SESSION['tienda2017Front_UserId']!=0)) comprobarcookies();

//******************************************************
//******************************************************


function generar_cookie($usuario)
{
    mt_srand (time());
    //generamos un número aleatorio
    $numero_aleatorio = mt_rand(1000000,999999999);

	global $con;
	
	
	$updateSQL = "UPDATE tblusuario SET strCookie = '".$numero_aleatorio."' WHERE idUsuario = ".$usuario;
	$Result1 = mysqli_query($con,  $updateSQL) or die(mysqli_error($con));
	echo $updateSQL;

    //3) ahora meto una cookie en el ordenador del usuario con el identificador del usuario y la cookie aleatoria
    setcookie("id_usuario_tienda2017", $usuario , time()+(60*60*24*12));
    setcookie("marca_aleatoria_usuario_tienda2017", $numero_aleatorio, time()+(60*60*24*12));
}

function comprobarcookies()
{
	
//primero tengo que ver si el usuario está memorizado en una cookie
if (isset($_COOKIE["id_usuario_tienda2017"]) && isset($_COOKIE["marca_aleatoria_usuario_tienda2017"])){
   //Tengo cookies memorizadas
	echo "ddd";
   //además voy a comprobar que esas variables no estén vacías
   if ($_COOKIE["id_usuario_tienda2017"]!="" || $_COOKIE["marca_aleatoria_usuario_tienda2017"]!=""){
      //Voy a ver si corresponden con algún usuario
	  global $con;
      
      $query_ConsultaFuncion = "select * from tblusuario where idUsuario=" . $_COOKIE["id_usuario_tienda2017"] . " AND strCookie='" . $_COOKIE["marca_aleatoria_usuario_tienda2017"] . "'";
	   //echo $query_ConsultaFuncion;
	  $ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	  $row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
 	  $totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);

      if ($totalRows_ConsultaFuncion==1){
         //SI TIENE COOKIE BUENA, SE LE DA ACCESO
		 $LoginRS__query="SELECT * FROM tblusuario WHERE idUsuario = ".$_COOKIE["id_usuario_tienda2017"]." AND intEstado=1";
  		 $LoginRS = mysqli_query($con,  $LoginRS__query) or die(mysqli_error($con));
		 $row_LoginRS = mysqli_fetch_assoc($LoginRS);
  
  
	$_SESSION['MM2_Username'] = $row_LoginRS["strEmail"];
    $_SESSION['MM2_UserGroup'] = $row_LoginRS["intNivel"];
    $_SESSION['MM2_IdUsuario'] = $row_LoginRS["idUsuario"];
	$_SESSION['tienda2017Front_UserId'] = $row_LoginRS["idUsuario"];
    $_SESSION['tienda2017Front_Mail'] = $row_LoginRS["strEmail"];
    $_SESSION['tienda2017Front_Nivel'] = $row_LoginRS["intNivel"];
    $_SESSION['MM2_Temporal']="ELEVADO";
	//ContabilizarAcceso($_SESSION['NOMBREWEB_UserId']);

	$linkhome = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	//$linkhome="index.php"; 
        header("Location: " . $linkhome );
      }
   }
} 
}

function MostrarVersionTienda()
{
	 $fh = fopen("../_admin/version.txt",'r');
						while ($line = fgets($fh)) {
						  // <... Do your work with the line ...>
						  $contenidofichero= $line;
						}
						fclose($fh);
	return $contenidofichero;
}

function MostrarCategoriasDependientes($categoria)
{
	global $con;
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcategoria WHERE refPadre = %s AND intEstado=1",
		 GetSQLValueString($categoria, "int"));
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);	
if ($totalRows_ConsultaFuncion>0){
		?>
		<div class="row">
		<div class="col-sm-12">
		<?php
		do{
			echo '<div class="col-sm-4">';
			?>
			<a href="<?php echo $_SERVER["REQUEST_URI"].$row_ConsultaFuncion["strSEO_1"];?>/" class="btn btn-default add-to-cart"><i class="fa fa-cog"></i><?php echo $row_ConsultaFuncion["strNombre_1"];?></a>
			<?php
			echo '</div>';
		} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
				?>
</div></div>		<?php	}
	mysqli_free_result($ConsultaFuncion);
}


?>