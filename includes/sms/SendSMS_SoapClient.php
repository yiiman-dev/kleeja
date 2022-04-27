<?php
// turn off the WSDL cache
ini_set("soap.wsdl_cache_enabled", "0");
  try {
$client = new SoapClient('http://api.payamak-panel.com/post/send.asmx?wsdl', array('encoding'=>'UTF-8'));
 $parameters['username'] = "demo";
    $parameters['password'] = "demo";
    $parameters['from'] = "10000.";
    $parameters['to'] = array("912...");
    $parameters['text'] ="سلام";
    $parameters['isflash'] = true;
    $parameters['udh'] = "";
    $parameters['recId'] = array(0);
    $parameters['status'] = 0x0;
echo $client->GetCredit(array("username"=>"wsdemo","password"=>"wsdemo"))->GetCreditResult;
echo $client->SendSms($parameters)->SendSmsResult;
echo $status;
 } catch (SoapFault $ex) {
    echo $ex->faultstring;
}
?>
