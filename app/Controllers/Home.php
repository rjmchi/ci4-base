<?php

namespace App\Controllers;

use App\Models\User;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function dashboard() {

        $uid = session()->get('loggedinUser');

        if (!$uid) {
            die('not logged in');
        }

        $umdl = new User();
        $data['user'] = $umdl->find(1);
        return view('dashboard', $data);
    }
}
