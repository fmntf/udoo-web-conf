<?php

namespace App\Http\Controllers;

use App\Services\IoT;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class IotController extends Controller
{
    public function index() {
        $iot = new IoT();

        return view('iot/index', [
            'iotbaseurl' => "http://cmu.udoo.cloud",
            'hostname' => trim(file_get_contents("/etc/hostname")),
            'loggedin' => $iot->getStatus() != 'Not logged in',
        ]);
    }

    public function register() {
        return 123;
    }
}
