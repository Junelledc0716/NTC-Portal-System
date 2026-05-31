<?php
namespace App\Controllers;
use App\Models\CourseModel;
use App\Models\ExamModel;
use App\Models\HomeworkModel;
use App\Models\AnnouncementModel;

class DashboardController extends BaseController {
    public function index() {
        if ($r = $this->requireLogin()) return $r;
        $studentId = session()->get('student_id');
        $courseModel = new CourseModel();
        $examModel = new ExamModel();
        $homeworkModel = new HomeworkModel();
        $announcementModel = new AnnouncementModel();

        $data = [
            'courses'       => $courseModel->getEnrolledCourses($studentId),
            'exams'         => $examModel->getExamsByStudent($studentId),
            'homeworks'     => $homeworkModel->getHomeworksByStudent($studentId),
            'announcements' => $announcementModel->orderBy('created_at','DESC')->findAll(5),
        ];
        return view('dashboard/index', $data);
    }
}