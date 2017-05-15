<?php
/**
 * Created by PhpStorm.
 * User: MK
 * Date: 5/6/2017
 * Time: 8:38 PM
 */

namespace App;
use View;


class Mailer
{
     const SMTPADDRESS = 'smtp.gmail.com';
     const PORT = 465;
     const ENCRYPTION = 'ssl';
     const EMAIL = 'dbseteam@gmail.com';
     const PASSWORD = 'Asd123456789';

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

    public function sendMail ($msg,$code=null){
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
        $var=$mailer->send($message);
        if($var){
            if($code!=null) {
                return response()->json(['msg' => $msg, 'code' => $code], 200);
            }
            else {
                return response()->json(['msg' => $msg], 200);
            }
        }

        return response()->json(['error'=>'this email is not correct'],404);
    }

}