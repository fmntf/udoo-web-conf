<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends BaseController
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {

        $username = $request->get('username');
        $password = $request->get('password');
        $password = '"' . str_replace('"', '\"', $password) . '"';

        exec("python " . app()->basePath() . "/bin/pam.py $username $password", $out, $ret);

        if ($ret === 0) {
            $_SESSION['auth'] = true;
            return redirect(route('index'));
        } else {
            return view('login', [
                'message' => 'Invalid password.'
            ]);
        }
    }

    public function logout() {
        $_SESSION['auth'] = false;
        return redirect(route('login'));
    }
}
