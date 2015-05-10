<?php
header("Content-type: text/xml"); 
include('nusoap.php');

?>
<?php

if(!isset($_REQUEST['valor1'])){
$valor1='Barcelona';
}else{
$valor1=$_REQUEST['valor1'];	
}
if(!isset($_REQUEST['valor2'])){
$valor2='spain';
}else{
$valor2=$_REQUEST['valor2'];	
}



$client = new nusoap_client('http://www.webservicex.net/globalweather.asmx?WSDL','wsdl');
$err = $client->getError();
if ($err) {

}

$param = array('CityName'=>$valor1,'CountryName'=>$valor2);

$result = $client->call('GetWeather',$param);

$result2 = end($result);

$result2 = mb_convert_encoding($result2, "UTF-16", "UTF-8");

if ($client->fault) {
} else {
	$err = $client->getError();
	if ($err) {

	} else {
		 $xml=simplexml_load_string($result2) or die("Error: Cannot create object");
		 echo $xml->asXML();


	}
}


?>