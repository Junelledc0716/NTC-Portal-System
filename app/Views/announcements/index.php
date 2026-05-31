<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h1>Announcements</h1>
    <p class="date-text">Stay updated with the latest school announcements</p>
</div>

<div class="ann-list">
<?php foreach($announcements as $i => $a): ?>
<?php
    $icons = ['fa-bullhorn', 'fa-bell', 'fa-calendar-alt', 'fa-info-circle', 'fa-star'];
    $icon  = $icons[$i % count($icons)];
    $days  = floor((time() - strtotime($a['created_at'])) / 86400);
    $age   = $days === 0 ? 'Today' : ($days === 1 ? 'Yesterday' : $days . ' days ago');
?>
<div class="ann-card">
    <div class="ann-icon-wrap">
        <i class="fas <?= $icon ?>"></i>
    </div>
    <div class="ann-body">
        <div class="ann-meta-top">
            <span class="ann-posted-by"><i class="fas fa-user-circle"></i> <?= esc($a['posted_by']) ?></span>
            <span class="ann-age"><?= $age ?></span>
        </div>
        <h4 class="ann-title"><?= esc($a['title']) ?></h4>
        <p class="ann-text"><?= esc($a['body']) ?></p>
        <div class="ann-footer">
            <span class="ann-date"><i class="fas fa-clock"></i> <?= date('F d, Y', strtotime($a['created_at'])) ?></span>
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>

<!-- PAGINATION -->
<div class="ann-pagination">
    <?php if($currentPage > 1): ?>
        <a href="<?= base_url('announcements/'.($currentPage-1)) ?>" class="ann-page-btn">
            <i class="fas fa-chevron-left"></i>
        </a>
    <?php endif; ?>

    <?php for($i = 1; $i <= $totalPages; $i++): ?>
        <a href="<?= base_url('announcements/'.$i) ?>"
           class="ann-page-btn <?= $i === $currentPage ? 'ann-page-active' : '' ?>">
            <?= $i ?>
        </a>
    <?php endfor; ?>

    <?php if($currentPage < $totalPages): ?>
        <a href="<?= base_url('announcements/'.($currentPage+1)) ?>" class="ann-page-btn">
            <i class="fas fa-chevron-right"></i>
        </a>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>