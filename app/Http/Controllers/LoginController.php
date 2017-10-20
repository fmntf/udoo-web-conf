<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {

        $username = trim($request->get('username'));
        $password = trim($request->get('password'));
        if ($username === $password && $password === 'udooer') {
            $_SESSION['default_password'] = true;
        }
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
