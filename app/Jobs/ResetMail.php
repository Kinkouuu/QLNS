<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\resetPass;

class ResetMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email;
    protected $pass;
    /**
     * Create a new job instance.
     */
    public function __construct($email,$pass)
    {
        $this->email = $email;
        $this->pass = $pass;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new resetPass($this->email,$this->pass));
    }
}
