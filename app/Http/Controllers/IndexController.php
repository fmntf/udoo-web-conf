<?php

namespace App\Http\Controllers;

use App\Services\BackgroundService;
use App\Services\IoT;
use App\Services\Stats;
use Laravel\Lumen\Routing\Controller;
use App\Services\Connections;

class IndexController extends Controller
{
    public function index() {
        return redirect(route('dashboard'));
    }

    public function dashboard() {
        $hostname = file_get_contents("/etc/hostname");

        $connections = new Connections();
        $stats = new Stats();
        $iot = new IoT();

        exec("udooscreenctl get", $screen, $status);
        if ($status === 0) {
            $screen = strtoupper(trim($screen[0]));
        } else {
            $screen = "Unknown";
        }

        exec("ping -c 1 google.com", $ping, $onlineStatus);

        return view('dashboard', [
            'ethernet' => $connections->getEthernetAddress(),
            'usb' => $connections->getUsbAddress(),
            'wlan' => $connections->getWirelessAddress(),
            'ssid' => $connections->getSSID(),
            'iot' => [
                'status' => $iot->getStatus(),
                'clientavailable' => $iot->isClientAvailable(),
                'loggedin' => $iot->isLoggedIn(),
            ],
            'board' => [
                'id' => $_SESSION['board']['id'],
                'name' => trim($hostname),
                'image' => $_SESSION['board']['image'],
                'model' => $_SESSION['board']['model'],
                'online' => $onlineStatus === 0 ? 'Connected' : 'Unavailable',
                'display' => $screen,
                'os' => $stats->getOS(),
                'uptime' => $stats->getUptime(),
                'temp' => $stats->getCpuTemperature(),
                'disk' => $stats->getDiskUsage(),
                'ram' => $stats->getRamUsage(),
            ],
            'default_password' => array_key_exists('default_password', $_SESSION) && $_SESSION['default_password'] === true,
        ]);
    }

    public function startwebsocket() {
        if (array_key_exists('websocketservice', $_SESSION)) {
            return response()->json([
                'success' => true
            ]);
        }

        $_SESSION['websocketservice'] = true;
        $bs = new BackgroundService();
        return $bs->run("wsserver");
    }
}
