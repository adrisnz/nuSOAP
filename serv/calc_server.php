<?php
	require_once '../lib/nusoap.php';

	$soap = new soap_server;
	$soap->configureWSDL('AddService', 'http://localhost/nuSOAP');
	$soap->wsdl->schemaTargetNamespace = 'http://localhost/nuSOAP';
	$soap->register('Add', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/nuSOAP');
	$soap->register('Restar', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/nuSOAP');
	$soap->register('Multiplicar', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/nuSOAP');
	$soap->register('Dividir', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/nuSOAP');

	$soap->service(isset($HTTP_RAW_POST_DATA) ?$HTTP_RAW_POST_DATA : '');

function Add($a, $b){
	return $a + $b;
}

function Restar($a, $b){
	return $a - $b;
}

function Multiplicar($a, $b){
	return $a * $b;
}

function Dividir($a, $b){
	return $a / $b;
}

?>

