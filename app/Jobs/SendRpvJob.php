<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\SendRpvMail;
class SendRpvJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $docs = "2.png";
    protected $to = "";
    protected $subject = "";
    protected $msg = "";
    public function __construct($file,$to,$subject,$msg)
    {
        $this->docs = $file;
        $this->to = $to;
        $this->subject = $subject;
        $this->msg = $msg;
        //file_put_contents(storage_path()."/x.txt",$file);

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $file = $this->docs;
        $msg = $this->msg;
        $subject = $this->subject;

        $email = new SendRpvMail($file,$msg,$subject);
        //print_r($email);
        Mail::to($this->to)->send($email);
    }

    public function failed()
    {
        file_put_contents(storage_path()."/x.txt","O job Falhou:");
    }
}
