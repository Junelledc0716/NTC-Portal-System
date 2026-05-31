<?php
namespace App\Models;
use CodeIgniter\Model;

class StudentModel extends Model {
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id','full_name','username','password','email','profile_pic','semester'];
}