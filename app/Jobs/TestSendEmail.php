<?php

namespace App\Jobs;

use App\Http\Controllers\ApiController;
use App\Mail\SendEmail;
use App\Models\Subscription;
use App\Models\WebSite;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class TestSendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $getPosts = [];
        $getWebsites = WebSite::all();
        foreach ($getWebsites as $website) {
            $actionName = $website->name;
            $getPosts[$website->name] = ApiController::$actionName($website->url);
        }

        if (count($getPosts)) {
            $getUsers = Subscription::with('webSite')->get();
            foreach ($getUsers as $key => $user) {
                if ($getPosts[$user->website->name]) {
                    $email = new SendEmail($getPosts[$user->website->name][$key]);
                    Mail::to($user->user_email)->send($email);
                }
            }
        }
    }
}
