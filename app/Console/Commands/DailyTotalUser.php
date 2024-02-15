<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Mail\MyTotalUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DailyTotalUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'User:totalUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Getting Daily Total Users Count';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $data['user_count'] = User::count();

        Mail::to('contact.niteshpawar@gmail.com')->send(new MyTotalUser($data));

        $this->info('Successfully sent Total User Email');
    }
}
