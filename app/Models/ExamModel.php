<?php
namespace App\Models;
use CodeIgniter\Model;

class ExamModel extends Model {
    protected $table = 'exams';
    protected $primaryKey = 'id';
    protected $allowedFields = ['course_id','exam_name','exam_date','exam_time','location','status'];
    
    public function getExamsByStudent($studentId) {
        return $this->db->table('exams ex')
            ->select('ex.*, c.course_code, c.course_name')
            ->join('courses c', 'c.id = ex.course_id')
            ->join('enrollments e', 'e.course_id = ex.course_id')
            ->where('e.student_id', $studentId)
            ->orderBy('ex.exam_date', 'ASC')
            ->get()->getResultArray();
    }
}