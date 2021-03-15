<?php

namespace App\Controllers;

use app\model\login_model;
use App\Models\login_model as ModelsLogin_model;

class Process extends BaseController
{

    public function __construct()
    {

        session();
        $this->model = new ModelsLogin_model();
    }
    public function delete($id)
    {
        if ($id == $_SESSION['id']) {
            session()->setFlashdata('error2', 'You cannot Delete a current active user');
        } else {
            $this->model->delete($id);
            session()->setFlashdata('delete', 'User Deleted successfully!');
        }

        return redirect()->to('/Home/Menu');
    }
    public function newuser()
    {
        if (!$this->validate([
            'user' => 'required',
            'password' => 'required|min_length[5]',
            'role' => 'Required'
        ])) {
            $validation = \config\Services::validation();
            return redirect()->to('/Home/Adduser')->withInput()->with('validation', $validation);
        } else {
            $data = [
                'Username' => htmlspecialchars($this->request->getVar('user')),
                'Userpassword' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'Roleid' => $this->request->getVar('role'),
            ];
            $this->model->insert($data);

            return redirect()->to('/Home/Menu');
        }
    }
    public function editname()
    {
        if (!$this->validate([
            'user' => 'required'
        ])) {
            $validation = \config\Services::validation();
            return redirect()->to('/Home/Edituser')->withInput()->with('validation', $validation);
        } else {
            $this->model->set('Username', $this->request->getVar('user'));
            $this->model->where('Userid', $this->request->getVar('id'));
            $this->model->update();
            session()->setFlashdata('editname', 'Username changed successfully!');
            return redirect()->to('/Home/Menu');
        }
    }
    public function update($id, $role)
    {
        if ($role == 1) {
            if ($id == $_SESSION['id']) {
                session()->setFlashdata('error1', 'You cannot change role of an active user');
            } else {
                $this->model->set('Roleid', '2');
                $this->model->where('Userid', $id);
                $this->model->update();
                session()->setFlashdata('editrole', 'Role changed successfully!');
            }
        }
        if ($role == 2) {
            $this->model->set('Roleid', '1');
            $this->model->where('Userid', $id);
            $this->model->update();
            session()->setFlashdata('editrole', 'Role changed successfully!');
        }

        return redirect()->to('/Home/Menu');
    }
}
