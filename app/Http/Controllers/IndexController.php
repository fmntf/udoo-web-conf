<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;

class IndexController extends Controller
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

        exec("udooscreenctl get", $screen, $status);
        if ($status === 0) {
            $screen = strtoupper(trim($screen[0]));
        } else {
            $screen = "Unknown";
        }

        exec("ping -c 1 google.com", $ping, $onlineStatus);
        $this->enableMotionSensors();

        $temp = (int)trim(file_get_contents("/sys/class/thermal/thermal_zone0/temp"));
        $temp = number_format($temp/1000, 1);

        $os = trim(file_get_contents("/etc/issue"));
        $os = explode(PHP_EOL, $os);
        $os = trim(str_replace('\n \l', '', $os[0]));

        $uptime = trim(file_get_contents("/proc/uptime"));
        $uptime = explode(" ", $uptime);
        $uptime = $this->secondsToTime((float)$uptime[0]);

        exec("df -x tmpfs -x devtmpfs |grep -v \'/boot\' |awk '{print $2 \"   \" $3}'", $disk, $retval);
        $disk = explode('   ', $disk[1]);
        $disk = ['total' => (int)$disk[0], 'free' => (int)$disk[1]];

        exec("free |grep Mem|awk '{print $2 \"   \" $3}'", $ram, $retval);
        $ram = explode('   ', $ram[0]);
        $ram = ['total' => (int)$ram[0], 'used' => (int)$ram[1]];

        return view('home', [
            'ethernet' => $ethernet,
            'usb' => $usb,
            'wlan' => $wireless,
            'ssid' => $ssid,
            'board' => [
                'id' => $_SESSION['board']['id'],
                'name' => $hostname,
                'image' => $_SESSION['board']['image'],
                'model' => $_SESSION['board']['model'],
                'online' => $onlineStatus === 0 ? 'Connected' : 'Unavailable',
                'display' => $screen,
                'os' => $os,
                'uptime' => $uptime,
                'temp' => $temp,
                'disk' => $disk,
                'ram' => $ram,
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

    private function secondsToTime($inputSeconds) {
        $secondsInAMinute = 60;
        $secondsInAnHour = 60 * $secondsInAMinute;
        $secondsInADay = 24 * $secondsInAnHour;

        // Extract days
        $days = floor($inputSeconds / $secondsInADay);

        // Extract hours
        $hourSeconds = $inputSeconds % $secondsInADay;
        $hours = floor($hourSeconds / $secondsInAnHour);

        // Extract minutes
        $minuteSeconds = $hourSeconds % $secondsInAnHour;
        $minutes = floor($minuteSeconds / $secondsInAMinute);

        // Extract the remaining seconds
        $remainingSeconds = $minuteSeconds % $secondsInAMinute;
        $seconds = ceil($remainingSeconds);

        // Format and return
        $timeParts = [];
        $sections = [
            'day' => (int)$days,
            'hour' => (int)$hours,
            'minute' => (int)$minutes,
            'second' => (int)$seconds,
        ];

        $i = 0;
        foreach ($sections as $name => $value) {
            if ($value > 0 && $i < 2) {
                $i++;
                $timeParts[] = $value. ' '.$name.($value == 1 ? '' : 's');
            }
        }

        return implode(', ', $timeParts);
    }
}
