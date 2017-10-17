<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Youssman\CountryLanguage\CountryLanguage;

class SettingsController extends BaseController
{
    public function base() {
        return view('settings/base', [
            'saved' => array_key_exists('saved', $_GET),
            'hostname' => file_get_contents("/etc/hostname")
        ]);
    }

    public function changepassword(Request $request) {
        $username = $request->request->get("username");
        $password = $request->request->get("password");

        exec("root:$password | chpasswd");
        if ($username === 'udooer') {
            exec("x11vnc -storepasswd $password /etc/x11vnc.pass");
        }

        return redirect(route('settings-base').'?saved');
    }

    public function sethostname(Request $request) {
        $hostname = $request->request->get("hostname");

        exec("echo $hostname > /etc/hostname");
        exec("echo '127.0.0.1   localhost ' $hostname >> /etc/hosts");

        return redirect(route('settings-base').'?saved');
    }

    public function network() {
        return view('settings/network', [
            'saved' => array_key_exists('saved', $_GET)
        ]);
    }

    public function wifinetworks() {
        $networks = [];

        exec("LANG=en nmcli --version", $out, $ret);
        $out = implode("", $out);
        if (strpos($out, "version 1.")) {
            $version = 1;
        } else {
            $version = 0;
        }

        exec("LANG=en nmcli dev wifi list", $out, $ret);

        for ($i=1; $i<count($out); $i++) {
            $line = $out[$i];
            if ($line[0] == '*') {
                $line[0] = ' ';
            }
            $line = explode("Infra", $line);
            $name = trim($line[0]);

            if ($version < 1) {
                $name = substr($name, 1, strlen($name) - 18);
                $name = trim($name);
                $name = substr($name, 0, strlen($name) -1);
            }

            $isProtected = false;
            if (strpos($line[1], "WPA") || strpos($line[1], "WEP")) {
                $isProtected = true;
            }

            if ($version < 1) {
                $startPos = strpos($line[1], "MB/s") + 6;
                $signal = trim(substr($line[1], $startPos));
                $signal = (int) trim(substr($signal,0, 4));
            } else {
                $startPos = strpos($line[1], "Mbit/s") + 7;
                $signal = (int) trim(substr($line[1], $startPos, 4));
            }

            $networks[] = [
                'networkName' => $name,
                'isProtected' => $isProtected,
                'signal' => $signal,
                'isSelected' => false
            ];
        }

        usort($networks, function($a, $b) {
            if ($a['signal'] < $b['signal']) {
                return 1;
            }
            return -1;
        });

        return response()->json([
            'success' => true,
            'wifi' => $networks
        ]);
    }

    public function wificonnect(Request $request) {
        $ssid = $request->request->get("ssid");
        $password = $request->request->get("password");

        $command = 'nmcli dev wifi con ' . '"' . $ssid . '"';
        if (trim($password) !== '') {
            $command .= 'password ' . '"' . $password . '"';
        }

        exec($command);

        return redirect(route('settings-network').'?saved');
    }

    public function regional() {
        $timezone = trim(file_get_contents("/etc/timezone"));
        exec("cat /etc/default/locale |grep LANG= |cut -c6-7", $out);
        $lang = trim($out[0]);

       return view('settings/regional', [
            'saved' => array_key_exists('saved', $_GET),
            'lang' => $lang,
            'timezone' => $timezone,
            'defaultTimezone' => $timezone === "Etc/UTC"
        ]);
    }

    public function regionallanguages($code) {
        $cl = new CountryLanguage();
        $country = $cl->getCountry($code);

        $langauges = [];
        foreach ($country['languages'] as $language) {
            $langauges[] = [
                'code' => $language['iso639_1'],
                'name' => $language['name'][0]
            ];
        }

        return response()->json([
            'success' => true,
            'languages' => $langauges
        ]);
    }

    public function regionalupdate(Request $request) {
        $timezone = $request->request->get("timezone");
        $country = $request->request->get("country");
        $language = $request->request->get("language");
        $lc = $language . "_" . $country;

        $commands = [
            "timedatectl set-timezone " . $timezone,
            "update-locale LC_ALL=" . $lc . ".UTF-8 LANG=" . $lc . ".UTF-8",
            "update-locale LC_ALL=" . $lc . ".UTF-8",
            "update-locale LC_ALL=" . $lc,
            "locale-gen " . $lc . " " . $lc . ".UTF-8",
            "DEBIAN_FRONTEND=noninteractive dpkg-reconfigure locales",
        ];

        foreach ($commands as $command) {
            exec($command);
        }

        return redirect(route('settings-regional').'?saved');
    }

    public function advanced() {
        exec("udooscreenctl get", $out, $status);
        if ($status === 0) {
            $screen = trim($out[0]);
        } else {
            $screen = "Unknown";
        }

        $m4 = null;
        if ($this->hasM4) {
            exec("udoom4ctl status", $out, $status);
            if ($status === 0) {
                $m4 = trim($out[0]);
            }
        }

        if (file_exists("/etc/init/udoo-web-conf.override")) {
            $port = -1;
        } else {
            if (file_exists("/etc/udoo-web-conf/port")) {
                $port = (int)trim(file_get_contents("/etc/udoo-web-conf/port"));
            } else {
                $port = 80;
            }
        }

        return view('settings/advanced', [
            'saved' => array_key_exists('saved', $_GET),
            'video' => $screen,
            'hasLvds15' => $this->hasLvds15,
            'hasM4' => $this->hasM4,
            'm4' => $m4 == 'true' ? 'enabled' : 'disabled',
            'port'=> $port,
        ]);
    }

    public function setvideo(Request $request) {

    }

    public function setm4(Request $request) {

    }

    public function sethttpport(Request $request) {

    }
}
