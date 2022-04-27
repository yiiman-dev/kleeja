<?php
// turn off the WSDL cache

ini_set("soap.wsdl_cache_enabled", "0");
$sms_client = new SoapClient('http://api.payamak-panel.com/post/receive.asmx?wsdl', array('encoding'=>'UTF-8'));

$parameters['username'] = "username";
$parameters['password'] = "pass";
$parameters['isRead'] =false;

echo $sms_client->GetInboxCount($parameters)->GetInboxCountResult;

?>
