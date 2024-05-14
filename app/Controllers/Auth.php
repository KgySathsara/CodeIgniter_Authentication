<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Hash;

class Auth extends Controller
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function save()
    {
        $validation = $this->validate([
            'name'=>[
                'rules' => 'required',
                'errors' => [
                    'required' => 'Full Name is Required',
                ]
            ],

            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email is Required',
                    'valid_email' => 'Enter a Valid Email',
                    'is_unique' => 'Email already taken',
                ]
            ],

            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Password is Required',
                    'min_length' => 'Password must be at least 5 characters in length',
                    'max_length' => 'Password must not have characters more than 12 in length',
                ]
            ],

            'confirmPassword' => [
                'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
                'errors' => [
                    'required' => 'Password is Required',
                    'min_length' => 'Password must be at least 5 characters in length',
                    'max_length' => 'Password must not have characters more than 12 in length',
                    'matches' => 'Confirm Password not matches to Password',
                ]
            ],
        ]);

        if(!$validation){
            return view('auth/register', ['validation' =>$this->validator ]);
        }else{
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
                'username' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ];

            $userModel = new \App\Models\UserModel();
            $query = $userModel->insert($values);
            if (!$query){
                return redirect()->back()->with('fail', 'Something went to wrong');
            }else{
                return redirect()->to('Auth')->with('success','Registration Successfully');
            }
        }
    }

    public function login()
    {
        $validation = $this->validate([
            'email'=>[
                'rules' => 'required|valid_email|is_not_unique[user.email]',
                'errors' => [
                    'required' => 'Your Email is Required',
                    'valid_email' => 'Enter a Valid Email Address',
                    'is_not_unique' =>'This email is not registered',
                ]
            ],

            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Password is Required',
                    'min_length' => 'Password must be at least 5 characters in length',
                    'max_length' => 'Password must not have characters more than 12 in length',
                ]
            ],
        ]);

        if(!$validation){
            return view('auth/login', ['validation'=>$this->validator]);
        }else{
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $userModel = new \App\Models\UserModel();
            $user_info = $userModel->where('email', $email)->first();
            $check_password = Hash::login($password, $user_info['password']);

            if(!$check_password){
                session()->setFlashdata('fail', 'Incorrect Password');
                return redirect()->to('Auth')->withInput();
            }else{
                $user_id = $user_info['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('/dashboard');
            }
        }
    }

    function logout()
    {
        if(session()->has('loggedUser'))
        {
            session()->remove('loggedUser');
            return redirect()->to('/Auth?access=out')->with('fail','Logged Out');
        }
    }
}