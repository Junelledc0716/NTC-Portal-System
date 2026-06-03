<?php
namespace App\Controllers;
use App\Models\StudentModel;

class AuthController extends BaseController {

    public function login() {
        if (session()->get('student_id')) return redirect()->to('/dashboard');
        return view('auth/login');
    }

    public function loginPost() {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $username = esc($username);

        $model   = new StudentModel();
        $student = $model->where('username', $username)->first();

        if ($student && password_verify($password, $student['password'])) {
            session()->set([
                'student_id'   => $student['id'],
                'student_name' => $student['full_name'],
                'profile_pic'  => $student['profile_pic'],
                'semester'     => $student['semester'],
                'logged_in'    => true
            ]);

            // Send login notification email
            $this->sendLoginEmail($student);

            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid username or password.');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }

    private function sendLoginEmail($student) {
        try {
            $email = \Config\Services::email();
            $email->setTo($student['email']);
            $email->setSubject('Login Notification — NTC Portal');
            $email->setMessage('
                <div style="font-family: Arial, sans-serif; max-width: 500px; margin: auto; padding: 30px; background: #f9f9f9; border-radius: 10px;">
                    <h2 style="color: #0a2540;">NTC Student Portal</h2>
                    <p>Hi <strong>' . esc($student['full_name']) . '</strong>,</p>
                    <p>A login was detected on your account.</p>
                    <table style="width:100%; margin: 20px 0; font-size: 14px;">
                        <tr>
                            <td style="padding: 8px; color: #666;">Date & Time:</td>
                            <td style="padding: 8px;"><strong>' . date('F d, Y h:i A') . '</strong></td>
                        </tr>
                        <tr style="background:#f0f0f0">
                            <td style="padding: 8px; color: #666;">Username:</td>
                            <td style="padding: 8px;"><strong>' . esc($student['username']) . '</strong></td>
                        </tr>
                    </table>
                    <p style="color: #666; font-size: 13px;">If this was not you, please contact the school administrator immediately.</p>
                    <hr>
                    <p style="font-size: 12px; color: #999;">NTC Portal — Student Information System</p>
                </div>
            ');
            $email->setMailType('html');

            if (!$email->send()) {
                log_message('error', 'Email failed: ' . $email->printDebugger(['headers']));
            }
        } catch (\Exception $e) {
            log_message('error', 'Email error: ' . $e->getMessage());
        }
    }
}