<?php
namespace App\Models;
use CodeIgniter\Model;

class HomeworkModel extends Model {
    protected $table = 'homeworks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['course_id','assignment_name','due_date','status','file_path','student_id'];
    
    public function getHomeworksByStudent($studentId) {
        return $this->db->table('homeworks h')
            ->select('h.*, c.course_code, c.course_name, c.color')
            ->join('courses c', 'c.id = h.course_id')
            ->where('h.student_id', $studentId)
            ->orderBy('h.due_date', 'ASC')
            ->get()->getResultArray();
    }
}