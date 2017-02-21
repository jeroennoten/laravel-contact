<?php


namespace JeroenNoten\LaravelContact\Http\Controllers;


use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{
    public function form()
    {
        return view('contact::form');
    }

    public function send(Request $request, Mailer $mail, Repository $config, ResponseFactory $response)
    {
        $mail->send('contact::mail', $request->all(), function (Message $message) use ($config, $request) {
            $message->to($config['contact.to.address'], $config['contact.to.name']);
            $message->subject($config['contact.subject']);

            $email = $request->input('email');
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message->from($request->input('email'), $request->input('name'));
            }
        });

        return $response->redirectTo('contact/success');
    }

    public function success()
    {
        return view('contact::success');
    }
}