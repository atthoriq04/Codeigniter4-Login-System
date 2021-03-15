<?php

namespace App\Models;

use CodeIgniter\Model;

class menu_model extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'Roleid';
    protected $allowedFields = ['Rolename'];
}
