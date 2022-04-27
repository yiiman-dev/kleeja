<?php
ini_set("soap.wsdl_cache_enabled", "0");
$sms_client = new SoapClient('http://api.payamak-panel.com/post/Receive.asmx?wsdl', array('encoding'=>'UTF-8'));
$parameters['username'] = "username";
$parameters['password'] = "password";
$parameters['location'] =  1;
$parameters['from'] = "";
$parameters['index'] = 0;
$parameters['count'] =10;
echo $sms_client->GetMessageStr($parameters)->GetMessageStrResult;
?> 