<?php
namespace App\Controllers;
use App\Models\StudentModel;

class AuthController extends BaseController {
    public function login() {
        if (session()->get('student_id')) return redirect()->to('/dashboard');
        return view('auth/login');
    }

    public function loginPost() {
        // CSRF is auto-handled by CI4
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password'); // use password_hash in production

        // XSS clean (Week 11)
        $username = esc($username);

        $model = new StudentModel();
        $student = $model->where('username', $username)->first();

        if($student && password_verify($password, $student['password'])) {
            session()->set([
                'student_id' => $student['id'],
                'student_name' => $student['full_name'],
                'profile_pic' => $student['profile_pic'],
                'semester' => $student['semester'],
                'logged_in' => true
            ]);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid username or password.');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }
}