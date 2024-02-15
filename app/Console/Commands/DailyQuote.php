<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DailyQuote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:daily';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Respectively send an exclusive quote to everyone daily via email';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $quotes = [
            'Mother Teresa'=> "Spread love everywhere you go. Let no one ever come to you without leaving happier.",
            'Franklin D. Roosevelt'=>'The only thing we have to fear is fear itself',
            'Martin Luther King Jr.'=>'Darkness cannot drive out darkness: only light can do that. Hate cannot drive out hate: only love can do that',
            'Eleanor Roosevelt'=>'Do one thing every day that scares you.'
        ];

        # setting up a random word
         $key =  array_rand($quotes);
         $data = $quotes[$key];
         $users = User::find([32,33]);

         $message = "{$key} -> {$data}";

         foreach($users as $user){
             Mail::raw($message, function($mail) use ($user){
                       $mail->from('niteshpawar019@gmail.com');
                       $mail->to($user->email)->subject('Daily New Quote');
             });
         };
         $this->info('Successfully sent daily quote to everyone');

    }
}
