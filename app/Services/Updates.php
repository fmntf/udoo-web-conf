<?php

namespace App\Services;

class Updates
{
    public function updateSources() {
        exec("apt-get update");
    }

    public function getNumberOfUpdates() {
        exec('LANGUAGE=C apt-get dist-upgrade -V --assume-no |grep "upgraded, "', $out, $ret);

        if (count($out) == 0) {
            return 0;
        }

        $parts = explode("upgraded, ", $out[0]);
        return (int) trim($parts[0]);
    }
}
