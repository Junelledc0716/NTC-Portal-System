<?php
namespace App\Controllers;
use Config\Services;
use App\Models\StudentModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('student_id'))
            return redirect()->to('/dashboard');
        return view('auth/login');
    }

    private function sendLoginNotification($student)
    {
        $email = Services::email();

        $email->setTo($student['email']); 
        $email->setSubject('NTC Portal - Login Notification');

        $htmlMessage = "
        <h2>Welcome back, {$student['full_name']}!</h2>
        <p>You have successfully logged into the <b>NTC Student Portal</b>.</p>
        <p><b>Login Time:</b> " . date('Y-m-d H:i:s') . "</p>
        <br>
        <p>If this wasn't you, please contact the admin immediately.</p>
    ";

        $email->setMessage($htmlMessage);

        $textMessage = "
        Welcome back, {$student['full_name']}!
        You have successfully logged into NTC Student Portal.
        Login Time: " . date('Y-m-d H:i:s');

        $email->setAltMessage($textMessage);

        if ($email->send()) {
            log_message('info', 'Login email sent to ' . $student['email']);
        } else {
            log_message('error', 'Login email FAILED for ' . $student['email']);
            log_message('error', print_r($email->printDebugger(['headers']), true));
        }
    }

    public function loginPost()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password'); 

        $username = esc($username);

        $model = new StudentModel();
        $student = $model->where('username', $username)->first();

        if ($student && password_verify($password, $student['password'])) {

            session()->set([
                'student_id' => $student['id'],
                'student_name' => $student['full_name'],
                'profile_pic' => $student['profile_pic'],
                'semester' => $student['semester'],
                'logged_in' => true
            ]);

            $this->sendLoginNotification($student);

            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid username or password.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

}
