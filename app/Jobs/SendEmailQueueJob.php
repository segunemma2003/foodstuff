<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Mail\OrderCreated;

class SendEmailQueueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $send_mail;
    protected $user;
    protected $order;

    /**
     * Create a new job instance.
     */
    public function __construct($send_mail, $user, $order)
    {
        $this->send_mail = $send_mail;
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = new OrderCreated($this->order, $this->user);
        Mail::to($this->send_mail)->send($email);
    }
}
