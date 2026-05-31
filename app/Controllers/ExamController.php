<?php
namespace App\Controllers;
use App\Models\ExamModel;
class ExamController extends BaseController {
    public function index() {
        if ($r = $this->requireLogin()) return $r;
        $model = new ExamModel();
        $data['exams'] = $model->getExamsByStudent(session()->get('student_id'));
        return view('examboard/index', $data);
    }
}