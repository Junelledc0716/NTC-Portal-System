<?php
namespace App\Models;
use CodeIgniter\Model;

class PaymentModel extends Model {
    protected $table      = 'payment_schedule';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id','month_label','due_date','amount','status','paid_date'];

    public function getByStudent($studentId) {
        return $this->where('student_id', $studentId)
                    ->orderBy('due_date', 'ASC')
                    ->findAll();
    }
}