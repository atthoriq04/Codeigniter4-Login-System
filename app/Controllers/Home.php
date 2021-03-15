<?php

namespace App\Controllers;

use app\model\menu_model;
use App\Models\menu_model as ModelsMenu_model;

class Home extends BaseController
{
	public function __construct()
	{
		session();
		if (session('Username') == null) {
			return redirect()->to('/Login');
		} else {
			$this->menumodel = new ModelsMenu_model();
		}
	}
	public function index()
	{
		if (session('Username') == null) {
			return redirect()->to('/Login');
		} else {
			$name = $_SESSION['Username'];
			$Role = $_SESSION['Roleid'];
			$data["Title"] = "Dashboard";
			$data['Username'] = $name;
			$data['Roleid'] = $Role;
			$Menu = $this->menumodel->where('Roleid', $Role)->first();
			$data['Rolename'] = $Menu['Rolename'];


			echo view('Template/header', $data);
			echo view('Dashboard/Dashboard', $data);
		}
	}
	public function Menu()
	{
		if (session('Username') == null) {
			return redirect()->to('/Login');
		} else {



			$name = $_SESSION['Username'];
			$Role = $_SESSION['Roleid'];

			$Menu = $this->menumodel->where('Roleid', $Role)->first();

			$data['Username'] = $name;
			$data['Roleid'] = $Role;
			$data['Rolename'] = $Menu['Rolename'];
			$data["Title"] = "Menu";

			//$data['Rolename'] = 

			if ($Role < 2) {
				echo view('Template/header', $data);
				echo view('Menu/Menu', $data);
			} else {
				return redirect()->to('/Home/');
			}
		}
	}
	public function Adduser()
	{
		$name = $_SESSION['Username'];
		$Role = $_SESSION['Roleid'];

		$Menu = $this->menumodel->where('Roleid', $Role)->first();

		$data['Username'] = $name;
		$data['Roleid'] = $Role;
		$data['Rolename'] = $Menu['Rolename'];
		$data["Title"] = "Add New User";
		$data['validation'] = \config\Services::validation();

		//$data['Rolename'] = 

		if ($Role < 2) {
			echo view('Template/header', $data);
			echo view('Menu/Adduser', $data);
		} else {
			return redirect()->to('/Home/');
		}
	}
	public function Editname($id)
	{
		$name = $_SESSION['Username'];
		$Role = $_SESSION['Roleid'];

		$Menu = $this->menumodel->where('Roleid', $Role)->first();
		$data['Username'] = $name;
		$data['Roleid'] = $Role;
		$data['Rolename'] = $Menu['Rolename'];
		$data["Title"] = "Edit Username";
		$data['validation'] = \config\Services::validation();
		$db = \config\Database::connect();
		$queryuser = " SELECT * FROM user WHERE Userid = $id";
		$setinguser = $db->query($queryuser)->getResultArray();
		$data['nama'] = $setinguser[0]['Username'];
		$data['id'] = $setinguser[0]['Userid'];

		if ($Role < 2) {
			echo view('Template/header', $data);
			echo view('Menu/Edit', $data);
		} else {
			return redirect()->to('/Home/');
		}
	}
}
