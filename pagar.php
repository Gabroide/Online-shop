<?php require_once('Connections/conexion.php');

//GUARDAR DATOS DE ENVIO

$_SESSION["COMPRA_intZona"] = $_POST["intZona"];
$_SESSION["COMPRA_strNombre"] = $_POST["strNombre"];
$_SESSION["COMPRA_strDireccion"] = $_POST["strDireccion"];
$_SESSION["COMPRA_strProvincia"] = $_POST["strProvincia"];
$_SESSION["COMPRA_strPais"] = $_POST["strPais"];
$_SESSION["COMPRA_strCP"] = $_POST["strCP"];
$_SESSION["COMPRA_strEmail"] = $_POST["strEmail"];
$_SESSION["COMPRA_strTelefono"] = $_POST["strTelefono"];


//ActualizarPreciosEnTablaCarrito();

if (!isset($_POST["intPago"])){
	header("Location:error.php?error=1");
	exit;
}
	else
	{
		if ($_POST["intPago"]==1)	
		{
			//TRANSFERENCIA
			ConfirmacionPago(1, 0);
	
			$contenido = GenerarEmailCliente(1);
			$asunto="Gracias por su pedido";
			GuardarEmailEnviado($_SESSION["compraactivavisa"], $contenido);
			EnvioCorreoHTML($_SESSION["COMPRA_strEmail"], $contenido, $asunto, 1);
			//
			//GeneracionFacturaInline($_SESSION["compraactivavisa"]);
			//
			header("Location:gracias.php?tipo=1");
			exit;
			
		}
		if ($_POST["intPago"]==5)	
		{
			//TRANSFERENCIA
			ConfirmacionPago(5, 0);
	
			$contenido = GenerarEmailCliente(5);
			$asunto="Gracias por su pedido";
			GuardarEmailEnviado($_SESSION["compraactivavisa"], $contenido);
			EnvioCorreoHTML($_SESSION["COMPRA_strEmail"], $contenido, $asunto, 1);
			//
			//GeneracionFacturaInline($_SESSION["compraactivavisa"]);
			//
			header("Location:gracias.php?tipo=5");
			exit;
			
		}
		if ($_POST["intPago"]==6)	
		{
			//TRANSFERENCIA
			ConfirmacionPago(6, 0);
	
			$contenido = GenerarEmailCliente(5);
			$asunto="Gracias por su pedido";
			GuardarEmailEnviado($_SESSION["compraactivavisa"], $contenido);
			EnvioCorreoHTML($_SESSION["COMPRA_strEmail"], $contenido, $asunto, 1);
			//
			//GeneracionFacturaInline($_SESSION["compraactivavisa"]);
			//
			header("Location:gracias.php?tipo=5");
			exit;
			
		}
if ($_POST["intPago"]==2)	
		{
			//ConfirmacionPago(1);
			//PAYPAL
			//CREAMOS UN NÜMERO BASADO EN EL IDUSUARIO PARA ASEGURARNOS DE QUE ES QUIEN DICE SER AL VOLVER A PAYPALOK.php
			$_SESSION["KeyPayPal"]=$_SESSION["usuariotempoactivo"]*2763;
			
			//DATOS FAKE:
			$urlpaypal=_strPAYPAL_url;
			$mailpaypal=_strPAYPAL_email;
			//DATOS REALES:
			//$urlpaypal="https://www.paypal.com/cgi-bin/webscr";
			//$mailpaypal="clientes@repuestoyrecambio.com";
			//$mailpaypal="mailreal";
			?>
             <form action="<?php echo $urlpaypal;?>" method="post" name="pagopaypal">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="<?php echo $mailpaypal;?>">
            <input type="hidden" name="item_name" value="Productos comprados en la tienda">
            <input type="hidden" name="currency_code" value="<?php echo ObtenerCodificacionMoneda();?>">
            <input type="hidden" name="no_shipping" value="1">
            <input type="hidden" name="amount" value="<?php echo number_format($_SESSION["Total"], 2, '.', '');?>">
            <input type="hidden" name="return" value="<?php echo _strURL;?>/paypalok.php">
			<input type="hidden" name="cancel_return" value="<?php echo _strURL;?>/error.php?error=5">
   
            
        </form>
        <script>
		document.pagopaypal.submit();
		</script>
            <?php
			
		}
	if ($_POST["intPago"]==3)	
		{
			//ConfirmacionPago(1);
			//LA CAIXA
					
			
			//DATOS FAKE:
			//$urlcaixa="https://sis-t.redsys.es:25443/sis/realizarPago";
			//DATOS REALES:
			$urlcaixa=_strCAIXA_url;

			
			// Se incluye la librería
	include 'includes/redsysHMAC256_API_PHP_5.2.0/apiRedsys.php';
	// Se crea Objeto
	$miObj = new RedsysAPI;

	// Valores de DEMO/REALES
	$fuc=_strCAIXA_fuc;
	$terminal=_strCAIXA_terminal;
	$moneda="978";
	$trans="0";
	$url="";
	$urlOKKO="";
	$id=time();
	$amount="145";


	
	// Se Rellenan los campos
	$miObj->setParameter("DS_MERCHANT_AMOUNT",number_format($_SESSION["Total"], 2, '', ''));
	$miObj->setParameter("DS_MERCHANT_ORDER",strval($id));
	$miObj->setParameter("DS_MERCHANT_MERCHANTCODE",$fuc);
	$miObj->setParameter("DS_MERCHANT_CURRENCY",$moneda);
	$miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE",$trans);
	$miObj->setParameter("DS_MERCHANT_TERMINAL",$terminal);
	$miObj->setParameter("DS_MERCHANT_MERCHANTURL",$url);
	$miObj->setParameter("DS_MERCHANT_URLOK","WEBWEB/caixaok.php");		
	$miObj->setParameter("DS_MERCHANT_URLKO","WEBWEB/error.php?error=7");

	//Datos de configuración
	$version=_strCAIXA_version;
	$kc = _strCAIXA_clave;//Clave recuperada de CANALES
	// Se generan los parámetros de la petición
	$request = "";
	$params = $miObj->createMerchantParameters();
	$signature = $miObj->createMerchantSignature($kc);
			?>
          
   <form  action="<?php echo $urlcaixa;?>" method="POST"  name="formcaixa">
<input type="hidden" name="Ds_SignatureVersion" value="<?php echo $version; ?>"/></br>
<input type="hidden" name="Ds_MerchantParameters" value="<?php echo $params; ?>"/></br>
<input type="hidden" name="Ds_Signature" value="<?php echo $signature; ?>"/></br>

</form>
            

        <script>
		document.formcaixa.submit();
		</script>
            <?php
			
		}
if ($_POST["intPago"]==4)	
		{
			//ConfirmacionPago(1);
			//SANTANDER
			
			//DATOS FAKE:
			//$urlsantander="https://hpp.prueba.santanderelavontpvvirtual.es/pay";
			//DATOS REALES:
			$urlsantander=_strSANTANDER_url;
			
			
			
$merchantid = _strSANTANDER_merchantid;
$secret = _strSANTANDER_merchantid;
$account = _strSANTANDER_account;

$timestamp = strftime("%Y%m%d%H%M%S");
mt_srand((double)microtime()*1000000);
$orderid = $timestamp."-".mt_rand(1, 999);
$curr = "EUR";
$amount = number_format($_SESSION["Total"], 2, '', '');

/*-----------------------------------------------
A continuación el código para generar una firma digital utilizando el algoritmo MD5 que 
PHP provee. Puedes usar SHA1 alternativamente.
*/
$tmp = "$timestamp.$merchantid.$orderid.$amount.$curr";
$sha1hash = sha1($tmp);
$tmp = "$sha1hash.$secret";
$sha1hash = sha1($tmp);
?>

<form action="<?php echo $urlsantander;?>" method=post name="formsantander">
	<input type=hidden name="MERCHANT_ID" value="<?=$merchantid?>">
   	<input type=hidden name="MERCHANT_RESPONSE_URL" value="WEBWEB/santander2.php">
	<input type=hidden name="ORDER_ID" value="<?=$orderid?>">
	<input type=hidden name="ACCOUNT" value="<?=$account?>">
	<input type=hidden name="CURRENCY" value="<?=$curr?>">
	<input type=hidden name="AMOUNT" value="<?=$amount?>">
	<input type=hidden name="TIMESTAMP" value="<?=$timestamp?>">
	<input type=hidden name="SHA1HASH" value="<?=$sha1hash?>">
	<input type=hidden name="AUTO_SETTLE_FLAG" value="1">
	
</form>
<script>
		document.formsantander.submit();
		</script>
<?php	

			
		}
	}
?>