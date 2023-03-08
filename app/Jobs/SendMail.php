<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $email,$password;
    public function __construct($email,$password)
    {
//        $this->delay= now()->addMinute();
        $this->email=$email;
        $this->password=$password;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user=[
            'email'=>$this->email,
            'password'=>$this->password,
        ];
        Mail::to($this->email)->send(new UserMail($user));

    }
}
