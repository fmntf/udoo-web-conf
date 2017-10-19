<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;

class WebsocketServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
    }

    /**
     * @return void
     */
    public function boot()
    {
        $path = app()->basePath() . "/websocket";
        exec("bash -c \"exec nohup setsid $path/start.sh > /dev/null 2>&1 &\"");
    }
}
