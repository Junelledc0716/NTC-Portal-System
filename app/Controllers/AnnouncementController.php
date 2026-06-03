<?php
namespace App\Controllers;
use App\Models\AnnouncementModel;

class AnnouncementController extends BaseController {
    public function index() {
        if ($r = $this->requireLogin()) return $r;

        $model = new AnnouncementModel();

        $announcements = $model->orderBy('created_at', 'DESC')
                               ->paginate(5, 'default');

        $pager       = $model->pager;
        $total       = $model->countAll();
        $currentPage = $pager->getCurrentPage();

        return view('announcements/index', [
            'announcements' => $announcements,
            'pager'         => $pager,
            'total'         => $total,
            'currentPage'   => $currentPage,
        ]);
    }
}