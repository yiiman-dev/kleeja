<?php
ini_set("soap.wsdl_cache_enabled", "0");
$sms_client = new SoapClient('http://api.payamak-panel.com/post/schedule.asmx?wsdl', array('encoding'=>'UTF-8'));

$parameters['username'] = "***";
$parameters['password'] = "***";
$parameters['to'] =  "912***";
$parameters['from'] = "3000***";
$parameters['text'] = "Test";
$parameters['isflash'] =false;
$parameters['scheduleDateTime'] = "2013-06-15T16:50:45";
$parameters['period'] = "Once";
echo $sms_client->AddSchedule($parameters)->AddScheduleResult;
?>