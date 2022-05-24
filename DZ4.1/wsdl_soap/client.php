<?php

header('Content-Type: text/plain');

try{
	ini_set('soap.wsdl_cache_enabled',0);
	ini_set('soap.wsdl_cache_ttl',0);

	$value = $_POST['value'];
    $conv = $_POST['conv'];
	
	$sClient = new SoapClient('konverter_service.wsdl');
	$response = $sClient->converter($conv, $value);
	
	var_dump($response);

} catch(SoapFault $e){
  var_dump($e);
  echo $e;
}

?>