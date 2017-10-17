<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArduinoController extends BaseController
{
    public function samples() {
        return view('arduino/samples');
    }

    public function webide() {
        $last = "";
        if (file_exists("/opt/udoo-web-conf/mysketch/mysketch.ino")) {
            $last = file_get_contents("/opt/udoo-web-conf/mysketch/mysketch.ino");
        }

        return view('arduino/webide', [
            'last' => $last
        ]);
    }

    public function appinventor() {
        return view('arduino/appinventor');
    }

    public function uploadsketch($sketch) {
        exec("/usr/bin/udooneo-m4uploader " . app()->basePath() . "/arduino_examples/" . $sketch . ".cpp.bin", $out, $status);

        return response()->json([
            'success' => $status === 0 ? true : false,
            'message' => implode(" ", $out)
        ]);
    }

    public function compilesketch() {
        exec("export DISPLAY=:0 && /usr/bin/arduino --upload ". app()->basePath() ."/mysketch/mysketch.ino", $out, $status);

        return response()->json([
            'success' => $status === 0 ? true : false,
            'errors' => [],
            'ide_data' => [
                'std_output' => "Output from Arduino IDE: " . implode(" ", $out),
                'err_output' => '',

            ]
        ]);
    }

    public function ardublockly() {
        return view('arduino/ardublockly');
    }

    public function ardublocklycompile(Request $request) {
        $code = $request->request->get("sketch_code");
        file_put_contents(app()->basePath() . "/mysketch/mysketch.ino", $code);

        return $this->compilesketch();
    }
}
