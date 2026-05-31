<?php
namespace App\Controllers;
use App\Models\StudentModel;

class AccountController extends BaseController {
    public function index() {
        if ($r = $this->requireLogin()) return $r;
        $model = new StudentModel();
        $data['student'] = $model->find(session()->get('student_id'));
        return view('account/index', $data);
    }

    public function update() {
        if ($r = $this->requireLogin()) return $r;
        $model = new StudentModel();
        $id = session()->get('student_id');

        $rules = [
            'full_name' => 'required|min_length[3]',
            'email'     => 'required|valid_email',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', implode(' ', $this->validator->getErrors()));
        }

        $updateData = [
            'full_name' => esc($this->request->getPost('full_name')),
            'email'     => esc($this->request->getPost('email')),
        ];

        $newPass = $this->request->getPost('new_password');
        $confirmPass = $this->request->getPost('confirm_password');
        if ($newPass && $newPass === $confirmPass) {
            $updateData['password'] = md5($newPass);
        }

        $model->update($id, $updateData);
        session()->set('student_name', $updateData['full_name']);
        return redirect()->to('/accountsettings')->with('success', 'Profile updated successfully!');
    }

    public function uploadPic() {
        if ($r = $this->requireLogin()) return $r;
        $file = $this->request->getFile('profile_pic');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $allowed = ['jpg','jpeg','png','webp'];
            if (!in_array($file->getClientExtension(), $allowed)) {
                return redirect()->back()->with('error', 'Only image files allowed.');
            }
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/profiles', $newName);
            $model = new StudentModel();
            $model->update(session()->get('student_id'), ['profile_pic' => $newName]);
            session()->set('profile_pic', $newName);
            return redirect()->to('/accountsettings')->with('success', 'Profile picture updated!');
            session()->set('student_name', esc($this->request->getPost('full_name')));
        }
        return redirect()->back()->with('error', 'Upload failed.');
    }
}