<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;

class TerminalController extends Controller
{
    public function index() {
        exec("bash -c \"ttyd -p 5712 login &\"");
        sleep(1);

        return view('terminal');
    }
}
