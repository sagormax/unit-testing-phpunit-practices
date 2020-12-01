<?php

namespace Code;


class Mailer
{
    public function send($email, $message)
    {
        if (empty($email)) {
            throw new \Exception();
        }

        // Call phpmailer class or 3rd party API
        sleep(3);

        echo "Successfully send";

        return true;
    }
}