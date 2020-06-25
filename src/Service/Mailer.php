<?php


namespace App\Service;


use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;

class Mailer extends AbstractController
{
    private $mailer;
    private $from;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendmail($subject, $to, $view, $variable)
    {
        $email = (new TemplatedEmail())
//            ->from($this->getParameter('mailer_from'))
            ->from('jeremy67230@gmail.com')
            ->to($to)
            ->subject($subject)
            ->htmlTemplate('email/' .$view .'.html.twig')
            ->context(['data' => $variable]);

        try {
            $this->mailer->send($email);
            return 'Succes';
        }catch (TransportExceptionInterface $e){
            return 'failed to send mail: ' .$e;
        }
    }
}