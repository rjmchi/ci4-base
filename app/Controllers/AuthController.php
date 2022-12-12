<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class AuthController extends BaseController
{
    public function __construct(){
        helper(['url', 'form']);
    }

    public function index(){
        return view('auth/login');
    }

    public function verifylogin() {
        $validated = $this->validate([
            'email'=> [
                'rules'=>'required|valid_email|is_not_unique[users.email]',
                'errors'=>[
                    'required'=>'email address is required',
                    'valid_email'=> 'a valid email address is required',
                    'is_not_unique'=>'email is not registered',
                ]
            ],
            'password'=>[
                'rules'=>'required',
                'errors'=> [
                    'required'=>'Password is required',
                ]
            ],
        ]);

        if (!$validated){
            return view('auth/login', ['validation'=>$this->validator]);
        }

        $u = new User();
        $user = $u->where('email', $this->request->getPost('email'))->first();

        if (!password_verify($this->request->getPost('password'), $user['password'])) {
            session()->setFlashdata('fail', 'Incorrect Password');
            return redirect()->to('login');
        }

        session()->set('loggedinUser', $user['id']);
        return redirect()->to('dashboard');
    }

    public function register() {
        return view('auth/register');
    }

    public function store() {
        //Validate user fields

        $validated = $this->validate([
            'username'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Username is required',
                ]
            ],
            'email'=> [
                'rules'=>'required|valid_email|is_unique[users.email]',
                'errors'=>[
                    'required'=>'email address is required',
                    'valid_email'=> 'a valid email address is required',
                    'is_unique'=>'email already on file',
                ]
            ],
            'password'=>[
                'rules'=>'required|min_length[5]',
                'errors'=> [
                    'required'=>'Password is required',
                    'min_length'=>'Password must be at least 5 characters',
                ]
            ],
            'confirm_password'=>[
                'rules'=>'required|matches[password]',
                'errors'=> [
                    'required'=>'Confirmation password is required',
                    'matches'=>'Confirmation password does not match password',
                ]
            ],
        ]);

        if (!$validated){
            return view('auth/register', ['validation'=>$this->validator]);
        }

        $u = new User();

        $resp = $u->insert([
            'name'=>$this->request->getPost('username'),
            'email'=>$this->request->getPost('email'),
            'password'=>password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'avatar'=>'default'
        ]);

        if (!$resp){
            return redirect()->back()->with('fail', 'Something went wrong');
        }

        return redirect()->back()->with('success', 'Thank you for registering');
    }

    public function logout() {

        session()->remove('loggedinUser');

        return redirect()->to('login')->with('message', 'You are logged out');
    }
}