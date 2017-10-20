<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;

class TerminalController extends Controller
{
    public function index() {
        return view('terminal');
    }
}
