<?php

namespace App\Http\Controllers;

use App\Services\Updates;
use Laravel\Lumen\Routing\Controller;

class UpdatesController extends Controller
{
    public function check() {
        $updates = new Updates();

        $updates->updateSources();
        $_SESSION['updates'] = $updates->getNumberOfUpdates();

        return response()->json([
            'success' => true,
            'updates' => $_SESSION['updates']
        ]);
    }

    public function install() {
        return view('updates');
    }
}
