<?php require_once('../Connections/conexion.php');
RestringirAcceso("1, 10");?>
<?php 
echo 

$query_DatosConsulta = sprintf("SELECT * FROM tblusuario WHERE idUsuario = ".GetSQLValueString($_GET["id"], "int"));

$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error($con));
$row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta);
$totalRows_DatosConsulta = mysqli_num_rows($DatosConsulta);

 /*?> $_SESSION['MM2_Username'] = $loginUsername;
 $_SESSION['MM2_UserGroup'] = $loginStrGroup;	
    $_SESSION['MM2_IdUsuario'] = $row_LoginRS["idUsuario"];<?php */
	$_SESSION['tienda2017Front_UserId'] = $row_DatosConsulta["idUsuario"];
    $_SESSION['tienda2017Front_Mail'] = $row_DatosConsulta["strEmail"];
    $_SESSION['tienda2017Front_Nivel'] = $row_DatosConsulta["intNivel"];
	$_SESSION['MM2_Temporal']="ELEVADO";

header("Location:"._strURL);

?>