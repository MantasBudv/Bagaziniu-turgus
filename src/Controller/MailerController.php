<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerController extends AbstractController
{
    /**
     * @Route("/email")
     */
    public function sendEmail(MailerInterface $mailer)
    {
        $email = (new Email())
            ->from('xamppemailtut@gmail.com')
            ->to('xamppemailtut@gmail.com')
            ->subject('Newsletter!')
            ->html('<h1>Naujienos!</h1>');

        $mailer->send($email);

        return new Response('Sent mail', 200);
    }
}