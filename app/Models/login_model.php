<?php

namespace App\Models;

use CodeIgniter\Model;

class login_model extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'Userid';
    protected $allowedFields = ['Username', 'Userpassword', 'Roleid'];
}
