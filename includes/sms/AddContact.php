<?php
ini_set("soap.wsdl_cache_enabled", "0");
$sms_client = new SoapClient('http://api.payamak-panel.com/post/contacts.asmx?wsdl', array('encoding'=>'UTF-8'));
                    $parameters['username'] = "***";
                    $parameters['password'] = "***";
                    $parameters['groupIds'] = "***";//My group Id in panel
                    $parameters['firstname'] ="MyUserFirstName";
                    $parameters['lastname'] = "MyUserLastName"; 		
	            $parameters['nickname'] = "MyUserNickName";
		    $parameters['corporation'] = "MyUserCorporation";
		    $parameters['mobilenumber'] ="MyUserMobileNumber";
		    $parameters['phone'] = "MyUserPhone";
		    $parameters['fax'] = "MyUserFax";
		    $parameters['birthdate'] = 2013-06-15;//for Example
                    $parameters['email'] = "MyUserEmailAddress";
		    $parameters['gender'] = 2;//For Example
		    $parameters['province'] = 18;//For Example
		    $parameters['city'] = 711;//For Example
		    $parameters['address'] = "MyUserAddress";
		    $parameters['postalCode'] = "MyUserPostalCode";
		    $parameters['additionaldate'] = 2013-06-15;//For Example
		    $parameters['additionaltext'] = "MyUserAdditionalText";
		    $parameters['descriptions'] = "MyUserDescriptions";
echo $sms_client->AddContact($parameters)->AddContactResult;	
?>