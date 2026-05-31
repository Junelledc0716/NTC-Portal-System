<?php
namespace App\Controllers;
use App\Models\HomeworkModel;

class HomeworkController extends BaseController {
    public function index($page = 1) {
        if ($r = $this->requireLogin()) return $r;
        $studentId = session()->get('student_id');
        $model = new HomeworkModel();

        $perPage = 5;
        $total = $model->where('student_id', $studentId)->countAllResults();
        $homeworks = $model->getHomeworksByStudent($studentId); // for simplicity; add pagination query

        $data = [
            'homeworks' => $homeworks,
            'pager'     => $model->pager,
            'currentPage' => $page,
            'totalPages' => ceil($total / $perPage),
        ];
        return view('homework/index', $data);
    }

    public function upload($id) {
        if ($r = $this->requireLogin()) return $r;
        // Week 12-13: File Upload
        $file = $this->request->getFile('homework_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $allowed = ['pdf','docx','zip','png','jpg'];
            if (!in_array($file->getClientExtension(), $allowed)) {
                return redirect()->back()->with('error', 'Invalid file type.');
            }
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $model = new HomeworkModel();
            $model->update($id, ['file_path' => $newName, 'status' => 'Completed']);
            return redirect()->to('/homeworks')->with('success', 'File uploaded successfully!');
        }
        return redirect()->back()->with('error', 'Upload failed.');
    }
}