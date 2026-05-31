<?php
namespace App\Models;
use CodeIgniter\Model;

class CourseModel extends Model {
    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $allowedFields = ['course_code','course_name','instructor','schedule_days','schedule_time','room','color'];
    
    public function getEnrolledCourses($studentId) {
        return $this->db->table('courses c')
            ->join('enrollments e', 'e.course_id = c.id')
            ->where('e.student_id', $studentId)
            ->get()->getResultArray();
    }
}