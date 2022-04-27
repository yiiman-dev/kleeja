<?php

/**
 * YiiMan.ir
 */
class SendMessage
{
    public $numbers = [];
    private $config = [];

    public function __construct($user, $config)
    {
        $this->config = $config;
        if (!empty($user['numbers'])) {
            $this->numbers = json_decode($user['numbers']);
        }
    }

    public function send()
    {
        if (!empty($this->numbers)) {
            foreach ($this->numbers as $item) {
                $number = $item->number;
                $whatsapp = isset($item->whatsapp);
                $sms = isset($item->sms);

                if ($sms) {
                    ini_set("soap.wsdl_cache_enabled", "0");
                    $sms_client = new SoapClient('http://api.payamak-panel.com/post/send.asmx?wsdl',
                        ['encoding' => 'UTF-8']);

                    $parameters['username'] = trim($this->config['SMSUsername']);
                    $parameters['password'] = trim($this->config['SMSPassword']);
                    $parameters['to'] = trim($number);
                    $parameters['from'] = trim($this->config['SMSLine']);
                    $parameters['text'] = $_POST['message'];
                    $parameters['isflash'] = false;

                    $result = $sms_client->SendSimpleSMS2($parameters)->SendSimpleSMS2Result;


                }
                if ($whatsapp) {
                    $result = $this->sendWhatsapp(trim($number));
                }
            }
        }
    }

    public function sendWhatsapp($number)
    {
        return $this->call('https://api.wallmessage.com/api/sendMessage', ['token' => $this->config['WhatsAppToken']],
            [
                "mobile"  => $number,
                "message" => $_POST['message']
            ],
            [],
            'post',
            [
                'Content-Type: application/json'
            ],
            true
        );
    }


    function call($url, $get = [], $post = [], $cookies = [], $method = 'post', $headers = [], $is_json = false)
    {

        if (!empty($get)) {
            $url .= '?'.http_build_query($get);
        }


        // Set the curl parameters.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);


        //conten-type
        $orgheaders = [
            "Accept: application/json",
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge_recursive($orgheaders, $headers));


        // Time OUT
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);

        // Turn off the server and peer verification (TrustManager Concept).
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        // UserAgent
        curl_setopt($ch, CURLOPT_USERAGENT, 'Softaculous');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        // Cookies
        if (!empty($cookies)) {
            curl_setopt($ch, CURLOPT_COOKIESESSION, true);
            curl_setopt($ch, CURLOPT_COOKIE, http_build_query($cookies, '', '; '));
        }

        if (!empty($post)) {
            curl_setopt($ch, CURLOPT_POST, 1);
            if ($is_json) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, @json_encode($post));
            } else {

                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
            }

        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Get response from the server.

        $resp = curl_exec($ch);
        $httpcode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);


        // The following line is a method to test
        //if(preg_match('/sync/is', $url)) echo $resp;


        return $resp;
    }


}
