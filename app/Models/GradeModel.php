<?php
namespace App\Models;
use CodeIgniter\Model;

class GradeModel extends Model {
    protected $table = 'grades';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id','course_id','midterm','finals','final_grade'];
    
    public function getGradesByStudent($studentId) {
        return $this->db->table('grades g')
            ->select('g.*, c.course_code, c.course_name')
            ->join('courses c', 'c.id = g.course_id')
            ->where('g.student_id', $studentId)
            ->get()->getResultArray();
    }
}