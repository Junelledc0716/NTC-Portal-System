<?php
namespace App\Controllers;
use App\Models\AnnouncementModel;

class AnnouncementController extends BaseController {
    public function index($page = 1) {
        if ($r = $this->requireLogin()) return $r;

        $model   = new AnnouncementModel();
        $perPage = 5;
        $total   = $model->countAll();
        $offset  = ($page - 1) * $perPage;

        $announcements = $model->orderBy('created_at', 'DESC')
                               ->findAll($perPage, $offset);

        $totalPages = ceil($total / $perPage);

        return view('announcements/index', [
            'announcements' => $announcements,
            'currentPage'   => $page,
            'totalPages'    => $totalPages,
        ]);
    }
}