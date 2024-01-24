<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\pagination\paginator;
use App\Models\Mailsetting;
use App\Models\reclamation;
use App\Observers\ReclamationObserver;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // if (\Schema::hasTable('mailsettings')) {
        //     $mailsetting = Mailsetting::first();
        //     if($mailsetting){
        //         $data = [
        //             'driver'            => $mailsetting->mail_transport,
        //             'host'              => $mailsetting->mail_host,
        //             'port'              => $mailsetting->mail_port,
        //             'encryption'        => $mailsetting->mail_encryption,
        //             'username'          => $mailsetting->mail_username,
        //             'password'          => $mailsetting->mail_password,
        //             'from'              => [
        //                 'address'=>$mailsetting->mail_from,
        //                 'name'   => 'LaravelStarter'
        //             ]
        //         ];
        //         Config::set('mail',$data);
        //     }
        // }

       
 
        //reclamation::observe(ReclamationObserver::class); 
        paginator::useBootstrap();
    }
}