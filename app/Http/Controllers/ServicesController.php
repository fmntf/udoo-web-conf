<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;

class ServicesController extends Controller
{
    public function websocket() {
        $script = $this->generateScript("./wsserver.sh", app()->basePath() . "/bin", "websocket");
        return $this->executeInBackground($script);
    }

    public function terminal() {
        $script = $this->generateScript("./terminal.sh",app()->basePath() . "/bin", "terminal");
        return $this->executeInBackground($script);
    }

    public function updates() {
        $script = $this->generateScript("./updates.sh",app()->basePath() . "/bin", "updates");
        return $this->executeInBackground($script);
    }

    private function generateScript($command, $dir, $name) {
        $script = "#/bin/bash\ncd $dir\nexec nohup setsid $command &\n";

        $fileName = sys_get_temp_dir() . "/uwc-script-$name.sh";

        file_put_contents($fileName, $script);
        chmod($fileName, 0770);

        return $fileName;
    }

    private function executeInBackground($script) {
        exec("$script >> /dev/null 2>&1 &");

        return response()->json([
            'success' => true
        ]);
    }
}
