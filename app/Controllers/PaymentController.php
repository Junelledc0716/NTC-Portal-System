<?php
namespace App\Controllers;
use App\Models\PaymentModel;
use App\Models\StudentModel;

class PaymentController extends BaseController {

    public function index() {
        if ($r = $this->requireLogin()) return $r;
        $studentId = session()->get('student_id');

        $paymentModel = new PaymentModel();
        $studentModel = new StudentModel();

        $student  = $studentModel->find($studentId);
        $schedule = $paymentModel->getByStudent($studentId);

        $remaining = $student['total_tuition'] - $student['total_paid'];

        $data = [
            'schedule'      => $schedule,
            'total_tuition' => $student['total_tuition'],
            'total_paid'    => $student['total_paid'],
            'remaining'     => $remaining,
        ];

        return view('payment/index', $data);
    }

    public function process() {
        if ($r = $this->requireLogin()) return $r;
        $studentId  = session()->get('student_id');
        $selected   = $this->request->getPost('selected_payments'); // array of IDs
        $method     = $this->request->getPost('payment_method');

        if (!$selected || !$method) {
            return redirect()->back()->with('error', 'Please select payments and a payment method.');
        }

        $paymentModel = new PaymentModel();
        $studentModel = new StudentModel();
        $totalToPay   = 0;

        foreach ($selected as $id) {
            $pay = $paymentModel->find($id);
            if ($pay && $pay['student_id'] == $studentId && $pay['status'] !== 'Paid') {
                $paymentModel->update($id, [
                    'status'    => 'Paid',
                    'paid_date' => date('Y-m-d'),
                ]);
                $totalToPay += $pay['amount'];
            }
        }

        $student = $studentModel->find($studentId);
        $studentModel->update($studentId, [
            'total_paid' => $student['total_paid'] + $totalToPay,
        ]);

        return redirect()->to('/payment')->with('success', 'Payment of ₱' . number_format($totalToPay, 2) . ' via ' . esc($method) . ' recorded successfully!');
    }
}