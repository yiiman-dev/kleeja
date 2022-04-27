<?php
	
	
	require_once('nusoap.php');
	$client = new nusoap_client('http://api.payamak-panel.com/post/send.asmx?wsdl');

	$err = $client->getError();

	if ($err) 
	{
 	 
 	   echo 'Constructor error' . $err;
 
	}

$parameters['username'] = "demo";
$parameters['password'] = "demo";
$parameters['to'] = "912...";
$parameters['from'] = "1000..";
$parameters['text'] ="تست";
$parameters['isflash'] =false;


    $result = $client->call('SendSimpleSMS2', $parameters);
    print_r($result);

?>