<?php

namespace App\Http\Controllers;

class BaseController extends \Laravel\Lumen\Routing\Controller
{
    public function __construct() {
        if (file_exists("/proc/device-tree/model")) {
            $model = file_get_contents("/proc/device-tree/model");
            $this->boardModel = trim($model);
            $this->cpuID = $this->getIMXCpuID();
        } else {
            $this->boardModel = "Unknown";
            $this->cpuID = file_get_contents("/sys/class/dmi/id/board_serial");
        }

        switch ($this->boardModel) {
            case 'UDOO Quad Board':
                $this->boardImage = 'quad.png';
                $this->hasArduinoMenu = false;
                $this->hasM4 = false;
                $this->hasLvds15 = true;
                break;
            case 'UDOO Dual-lite Board':
                $this->boardImage = 'dual.png';
                $this->hasArduinoMenu = false;
                $this->hasM4 = false;
                $this->hasLvds15 = true;
                break;
            case 'UDOO Neo Extended':
                $this->boardImage = 'neo_extended.png';
                $this->hasArduinoMenu = true;
                $this->hasM4 = true;
                $this->hasLvds15 = false;
                break;
            case 'UDOO Neo Full':
                $this->boardImage = 'neo_full.png';
                $this->hasArduinoMenu = true;
                $this->hasM4 = true;
                $this->hasLvds15 = false;
                break;
            case 'UDOO Neo Basic Kickstarter':
            case 'UDOO Neo Basic':
                $this->boardImage = 'neo_basic.png';
                $this->hasArduinoMenu = true;
                $this->hasM4 = true;
                $this->hasLvds15 = false;
                break;
            default:
                $this->boardImage = 'unknown.png';
                $this->hasArduinoMenu = false;
                $this->hasM4 = false;
                $this->hasLvds15 = false;
        }

    }

    private function getIMXCpuID() {
        $H = file_get_contents("/sys/fsl_otp/HW_OCOTP_CFG0");
        $L = file_get_contents("/sys/fsl_otp/HW_OCOTP_CFG1");

        $H = str_replace("0x", "", $H);
        $L = str_replace("0x", "", $L);

        return strtoupper($L . $H);
    }
}