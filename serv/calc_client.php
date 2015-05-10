

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
 
require_once ('../lib/nusoap.php');

$wsdl="http://localhost/nuSOAP/serv/calc_server.php?wsdl";
$client = new nusoap_client($wsdl,'wsdl');


if (isset($_POST['operacion']))  

{

$a=$_POST['primernumero'];
$b=$_POST['segundonumero'];

$params = array('a' => $a, 'b'=>$b);

 

if($_POST['operacion']==1)

{

$result= $client->call('Add', $params);
echo '<h2>Resultat</h2><pre>';
$err = $client->getError();
if ($err) {
	// Display the error
	echo '<p><b>Error: '.$err.'</b></p>';
} else {
	// Display the result
	print_r($result);
}


}  


if($_POST['operacion']==2)

{

$result= $client->call('Restar', $params);
echo '<h2>Resultat</h2><pre>';
$err = $client->getError();
if ($err) {
	// Display the error
	echo '<p><b>Error: '.$err.'</b></p>';
} else {
	// Display the result
	print_r($result);
}


}  

if($_POST['operacion']==3)

{

$result= $client->call('Multiplicar', $params);
echo '<h2>Resultat</h2><pre>';
$err = $client->getError();
if ($err) {
	// Display the error
	echo '<p><b>Error: '.$err.'</b></p>';
} else {
	// Display the result
	print_r($result);
}


}  

if($_POST['operacion']==4)

{

$result= $client->call('Dividir', $params);
echo '<h2>Resultat</h2><pre>';
$err = $client->getError();
if ($err) {
	// Display the error
	echo '<p><b>Error: '.$err.'</b></p>';
} else {
	// Display the result
	print_r($result);
}


}  





}
?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
Primer numero<br>
<input type="text" name="primernumero">
<br>
Segundo numero:<br>
<input type="text" name="segundonumero">
Sumar<input type="radio" name="operacion" value="1">
Restar<input type="radio" name="operacion" value="2">
Multiplicar<input type="radio" name="operacion" value="3">
Dividir<input type="radio" name="operacion" value="4">


<input type="submit" />
</form>


</body>
</html>

