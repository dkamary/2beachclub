<?php

namespace App\Managers;

class MailManager
{
    public static function send(string $to, string $subject, string $content)
    {
        $headers = "MIME-Version: 1.0 \r\n";
        $headers .= "Content-type:text/html;charset=UTF-8 \r\n";
        $headers .= "From: 2Beach Club <noreply@2beachclub.mu> \r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion() ."\r\n";
        $headers .= 'BCC: donatkamary@gmail.com';
        @mail($to, $subject, $content, $headers);
    }
}
