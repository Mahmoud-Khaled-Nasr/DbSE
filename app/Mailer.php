<?php
/**
 * Created by PhpStorm.
 * User: MK
 * Date: 5/6/2017
 * Time: 8:38 PM
 */

namespace App;


class Mailer
{
    private const SMTPADDRESS = 'smtp.gmail.com';
    private const PORT = 465;
    private const ENCRYPTION = 'ssl';
    private const EMAIL = 'dbseteam@gmail.com';
    private const PASSWORD = 'Asd123456789';

    private $emailView;
    private $body;
    private $title;
    private $email;
    private $name;

    /**
     * Mailer constructor.
     */
    public function __construct($emailView, $body, $title, $email, $name)
    {
        $this->emailView=$emailView;
        $this->body=$body;
        $this->title=$title;
        $this->email=$email;
        $this->name=$name;
    }

    public function sendMail (){
        // Prepare transport
        $transport = \Swift_SmtpTransport::newInstance(Mailer::SMTPADDRESS, Mailer::PORT, Mailer::ENCRYPTION)
            ->setUsername(Mailer::EMAIL)
            ->setPassword(Mailer::PASSWORD);
        $mailer = \Swift_Mailer::newInstance($transport);

        // Prepare content
        $view = View::make($this->emailView, [
            'message' => $this->body
        ]);

        $html = $view->render();

        // Send email
        $message = \Swift_Message::newInstance($this->title)
            ->setFrom(['no-reply@dbse.com' => 'dbse team'])
            ->setTo([$this->email => $this->name])
            // If you want plain text instead, remove the second paramter of setBody
            ->setBody($html, 'text/html');

        return($mailer->send($message));
    }

}