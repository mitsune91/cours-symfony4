<?php

namespace App\Event;

use App\Entity\User;
use App\Event\RegisterEvent;


class RegisterListener
{

    private $mailer;
    private $sender;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
        $this->sender = '2442bc56d0-3732fa@inbox.mailtrap.io';
    }

    public function sendMailToUser(RegisterEvent $e)
    {
        /** @var User $user */
        $user = $e->getUser();
        $subject = "YEAH";
        $body = 'Coucou' . $user->getPseudo() . ' Ca va ? ';
        $message = (new \Swift_Message())->setSubject($subject)->setFrom($this->sender)->setTo($user->getEmail())->setBody($body);

        $this->mailer->send($message);
    }
}