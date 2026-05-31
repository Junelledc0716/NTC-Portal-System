<?php
namespace App\Controllers;
use App\Models\CourseModel;

class CourseController extends BaseController {

    protected $db;

    public function __construct() {
        $this->db = \Config\Database::connect();
    }

    public function index() {
        if ($r = $this->requireLogin()) return $r;
        $studentId = session()->get('student_id');
        $model = new CourseModel();

        $enrolled    = $model->getEnrolledCourses($studentId);
        $enrolledIds = array_column($enrolled, 'id');

        if (!empty($enrolledIds)) {
            $available = $model->whereNotIn('id', $enrolledIds)->findAll();
        } else {
            $available = $model->findAll();
        }

        return view('courses/index', [
            'courses'   => $enrolled,
            'available' => $available,
        ]);
    }

    public function addCourse() {
        if ($r = $this->requireLogin()) return $r;
        $studentId = session()->get('student_id');
        $courseId  = $this->request->getPost('course_id');

        if (!$courseId) {
            return redirect()->back()->with('error', 'Please select a course.');
        }

        $existing = $this->db->table('enrollments')
            ->where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->get()->getRow();

        if ($existing) {
            return redirect()->back()->with('error', 'You are already enrolled in this course.');
        }

        $this->db->table('enrollments')->insert([
            'student_id' => $studentId,
            'course_id'  => $courseId,
        ]);

        return redirect()->to('/enrolledcourses')->with('success', 'Course added successfully!');
    }

    public function unenroll($courseId) {
        if ($r = $this->requireLogin()) return $r;
        $studentId = session()->get('student_id');

        $this->db->table('enrollments')
            ->where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->delete();

        return redirect()->to('/enrolledcourses')->with('success', 'Course unenrolled successfully.');
    }
}