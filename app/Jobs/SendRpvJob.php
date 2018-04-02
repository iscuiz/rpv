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

    public function __construct($file)
    {
        $this->docs = $file;
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
        
        $email = new SendRpvMail($file);
        //print_r($email);
        Mail::to("matheus.souzadv@gmail.com")->send($email);
    }

    public function failed()
    {
        file_put_contents(storage_path()."/x.txt","O job Falhou:");
    }
}
