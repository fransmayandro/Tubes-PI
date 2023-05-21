<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class RegisUserController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function actionregister(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'level' => 0,
        ]);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('register');
    }
    
    // public function process()
    // {
    //     $this->load->model('User_model');
        
    //     $username = $this->input->post('username');
    //     $email = $this->input->post('email');
    //     $password = $this->input->post('password');
        
    //     $data = array(
    //         'username' => $username,
    //         'email' => $email,
    //         'password' => password_hash($password, PASSWORD_DEFAULT)
    //     );
        
    //     $this->User_model->register($data);
        
    //     redirect('index');
    // }
}
