<?php
namespace App\Controllers;
class GradeController extends BaseController {
    public function index() {
        if ($r = $this->requireLogin()) return $r;
        return view('grade/index'); // just shows "not available" modal
    }
}