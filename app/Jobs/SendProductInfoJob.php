<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendProductInfoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('SendProductInfoJob started.');

        $products = Product::all();
        $users = User::all();

        foreach ($users as $user) {
            Log::info('Sending email to user: ' . $user->email);

            Mail::raw('Products: ' . $products->map(function ($product) {
                return $product->name . ' | Price: ' . $product->price;
            })->implode(', '), function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Product Information');
            });

            Log::info('Email sent to user: ' . $user->email);
        }

        Log::info('SendProductInfoJob completed.');
    }
}
