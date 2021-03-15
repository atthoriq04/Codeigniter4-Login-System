<?php

namespace App\Controllers;

use app\model\login_model;
use App\Models\login_model as ModelsLogin_model;
use CodeIgniter\Session\Session;
use Config\Validation;

class Login extends BaseController
{
    public function Index()
    {
        Session();
        if (!session('Username') == null) {
            return redirect()->to('/Home');
        } else {
            $data = ['validation' => \config\Services::validation()];
            return view('Login/Login', $data);
        }
    }
    public function logout()
    {
        Session();
        session()->destroy();
        return redirect()->to('/Login');
    }
    public function Process()
    {
        Session();
        if (!$this->validate([
            'user' => 'required',
            'password' => 'required'
        ])) {
            $validation = \config\Services::validation();
            return redirect()->to('/Login')->withInput()->with('validation', $validation);
        } else {
            $session = session();
            $password = $this->request->getVar('password');
            $model = new ModelsLogin_model();

            $user = $model->where('Username', $this->request->getVar('user'))
                ->first();
            if ($user) {
                if (password_verify($password, $user['Userpassword'])) {
                    $data = [
                        'id' => $user['Userid'],
                        'Username' => $user['Username'],
                        'Roleid' => $user['Roleid']
                    ];
                    $session->set($data);
                    session()->setFlashdata('Success', 'Login Success! Welcome!');
                    return redirect()->to('/Home/');
                } else {
                    session()->setFlashdata('password', 'Wrong password tryAgain');
                    return redirect()->to('/Login');
                }
            } else {
                session()->setFlashdata('user', 'No User Found! try Again');
                return redirect()->to('/Login');
            }
        }
    }
}
