<?php require_once('Connections/conexion.php');

if ((!isset($_SESSION["usuariotempoactivo"])) || ($_SESSION["KeyPayPal"]!=($_SESSION["usuariotempoactivo"]*2763))){
	header("Location:error.php?error=5");
	exit;
}
else
{
	//REINICIALIZAMOS EL VALOR CLAAVE PARA SABER EL USUARIO
	$_SESSION["KeyPayPal"]="";
	ConfirmacionPago(2, 1);
	$contenido = GenerarEmailCliente(1);
	$asunto="Gracias por su pedido";
	GuardarEmailEnviado($_SESSION["compraactivavisa"], $contenido);
	EnvioCorreoHTML($_SESSION["COMPRA_strEmail"], $contenido, $asunto, 1);
	//
	//GeneracionFacturaInline($_SESSION["compraactivavisa"]);
	//
	header("Location:gracias.php?tipo=2");
	exit();
	
	}
?>