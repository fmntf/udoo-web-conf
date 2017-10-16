<?php

namespace App\Http\Controllers;

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
        exec("/usr/bin/udooneo-m4uploader /opt/udoo-web-conf/arduino_examples/" . $sketch . ".cpp.bin", $out, $status);

        return response()->json([
            'success' => $status === 0 ? true : false,
            'message' => implode(" ", $out)
        ]);
    }

    public function compilesketch() {
        exec("export DISPLAY=:0 && /usr/bin/arduino --upload /opt/udoo-web-conf/mysketch/mysketch.ino", $out, $status);

        return response()->json([
            'success' => $status === 0 ? true : false,
            'message' => implode(" ", $out)
        ]);
    }
}
