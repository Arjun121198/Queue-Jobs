<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;
use App\Mail\MailNotify;


class NextJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $users, $q;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($users, $q)
    {
        $this->users = $users;
        $this->q = $q;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $q = $this->q;
        if ($q === 0) {
            $users = $this->users;
            foreach ($users as $user) {
                $email = $user->email;
                $job = new NextJob($email, 1);
                dispatch($job);
            }
        } else {
            $user = $this->users;
            Mail::to($user)->send(new MyTestMail);
            return redirect('/Home')->with('success', 'Successfull');
        }
    }
}
