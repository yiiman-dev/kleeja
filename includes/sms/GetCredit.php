<?php
ini_set("soap.wsdl_cache_enabled", "0");
$sms_client = new SoapClient('http://api.payamak-panel.com/post/Send.asmx?wsdl', array('encoding'=>'UTF-8'));

$parameters['username'] = "username";
$parameters['password'] = "password";

echo $sms_client->GetCredit($parameters)->GetCreditResult;
?>