<?php
// turn off the WSDL cache

ini_set("soap.wsdl_cache_enabled", "0");
$sms_client = new SoapClient('http://api.payamak-panel.com/post/send.asmx?wsdl', array('encoding'=>'UTF-8'));

$parameters['username'] = "demo";
$parameters['password'] = "demo";
$parameters['to'] = "912...";
$parameters['from'] = "1000..";
$parameters['text'] ="تست";
$parameters['isflash'] =false;

echo $sms_client->SendSimpleSMS2($parameters)->SendSimpleSMS2Result;

?>
