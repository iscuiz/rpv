<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRpvMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $doc;
    protected $msg;
    protected $subj;
    public function __construct($doc,$msg,$subject)
    {
        //
        $this->doc = $doc;
        $this->msg = $msg;
        $this->subj = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if(is_array($this->doc) || is_object($this->doc))
        {

            $email =  $this->subject($this->subj)
            ->view('email.send-rpv')->with(['msg'=>$this->msg]);
            foreach($this->doc as  $file)
            {

                $email->attach(storage_path()."\\app\\docs\\$file",[
                    'as' => $file,
                    'mime'=>'application/pdf'
                    ]);;
            }
            return $email;
        }

        return $this->view('email.send-rpv')
        ->attach(storage_path()."\\app\\docs\\$this->doc",[
            'as' => $this->doc,
            'mime'=>'application/pdf'
            ]);
    }
}
