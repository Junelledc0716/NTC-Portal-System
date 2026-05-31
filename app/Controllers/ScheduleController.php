<?php
namespace App\Controllers;
use App\Models\CourseModel;
class ScheduleController extends BaseController {
    public function index() {
        if ($r = $this->requireLogin()) return $r;
        $model = new CourseModel();
        $data['courses'] = $model->getEnrolledCourses(session()->get('student_id'));
        return view('schedule/index', $data);
    }
}