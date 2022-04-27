<?php

/**
 * YiiMan.ir
 */
class SendMessage
{
    public $numbers = [];

    public function __construct($user)
    {
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

                }
            }
        }
    }
}
