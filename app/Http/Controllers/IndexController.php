<?php

namespace App\Http\Controllers;

class IndexController extends BaseController
{
    public function index() {
        return redirect(route('dashboard'));
    }

    public function dashboard() {
        $hostname = file_get_contents("/etc/hostname");

        $devices = [
            'eth' => $this->getInterfaceName(["eth", "en"]),
            'wlan' => $this->getInterfaceName(["wl"]),
            'usb' => $this->getInterfaceName(["usb"]),
        ];

        $ethernet = $this->getInterfaceAddress($devices['eth']);
        $wireless = $this->getInterfaceAddress($devices['wlan']);
        $usb = $this->getInterfaceAddress($devices['usb']);

        $ssid = trim(exec("iw dev " . $devices['wlan'] . " link | grep SSID"));
        if ($ssid) {
            $ssid = explode("SSID:", $ssid);
            $ssid = trim($ssid[1]);
        }

        $bt = trim(exec("hcitool dev |grep hci0| awk '{print $2}'"));
        if (!$bt) {
            $bt = "Not connected";
        }

        exec("ping -c 1 google.com", $out, $onlineStatus);
        $this->enableMotionSensors();

        return view('home', [
            'ethernet' => $ethernet,
            'usb' => $usb,
            'wlan' => $wireless,
            'ssid' => $ssid,
            'bt' => $bt,
            'board' => [
                'id' => $_SESSION['board']['id'],
                'name' => $hostname,
                'image' => $_SESSION['board']['image'],
                'model' => $_SESSION['board']['model'],
                'online' => $onlineStatus === 0 ? 'Connected' : 'Unavailable',
            ],
        ]);
    }

    private function getInterfaceName(array $names) {
        $files = scandir("/sys/class/net");
        foreach ($files as $file) {
            foreach ($names as $name) {
                if (strpos($file, $name) === 0) {
                    return $file;
                }
            }
        }
    }

    private function getInterfaceAddress($interface) {
        if ($interface === null) {
            return 'Not connected';
        }
        $result = trim(exec("ip -4 -o addr show $interface"));
        if (!$result) {
            return 'Not connected';
        }
        $parts = explode("inet ", $result);
        $parts = explode("/", $parts[1]);
        return $parts[0];
    }

    private function enableMotionSensors() {
        foreach ([
            "/sys/class/misc/FreescaleGyroscope/enable",
            "/sys/class/misc/FreescaleAccelerometer/enable",
            "/sys/class/misc/FreescaleMagnetometer/enable",
        ] as $sensor) {
            if (file_exists($sensor)) {
                file_put_contents($sensor, 1);
            }
        }
    }
}
