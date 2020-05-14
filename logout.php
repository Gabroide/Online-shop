<?php require_once('Connections/conexion.php');

$_SESSION['MM2_Username']="";
$_SESSION['MM2_UserGroup']="";
$_SESSION['MM2_IdUsuario']="";
$_SESSION['tienda2017Front_UserId']="";
$_SESSION['tienda2017Front_Mail']="";
$_SESSION['tienda2017Front_Nivel']="";
$_SESSION['MM2_Temporal']="";
$_SESSION['tienda2017Front_Temporal']="";
unset($_SESSION['MM2_Username']);
unset($_SESSION['MM2_UserGroup']);
unset($_SESSION['MM2_IdUsuario']);
unset($_SESSION['tienda2017Front_UserId']);
unset($_SESSION['tienda2017Front_Mail']);
unset($_SESSION['tienda2017Front_Nivel']);
unset($_SESSION['MM2_Temporal']);
unset($_SESSION['tienda2017Front_Temporal']);

	setcookie("id_usuario_tienda2017", $_SESSION['tienda2017Front_UserId'] , time()-(60*60*24*30));

header("Location: index.php");
?>