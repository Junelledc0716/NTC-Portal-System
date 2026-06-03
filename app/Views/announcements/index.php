<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h1>Announcements</h1>
    <p class="date-text">Stay updated with the latest school announcements</p>
</div>

<!-- ANNOUNCEMENTS LIST -->
<div class="ann-list">
<?php if(empty($announcements)): ?>
    <div class="empty-state">
        <i class="fas fa-bullhorn"></i>
        <p>No announcements found.</p>
    </div>
<?php else: ?>
<?php foreach($announcements as $i => $a): ?>
<?php
    $icons = ['fa-bullhorn', 'fa-bell', 'fa-calendar-alt', 'fa-info-circle', 'fa-star'];
    $icon  = $icons[$i % count($icons)];
    $days  = floor((time() - strtotime($a['created_at'])) / 86400);
    if ($days === 0)     $age = 'Today';
    elseif ($days === 1) $age = 'Yesterday';
    else                 $age = $days . ' days ago';
?>
<div class="ann-card">
    <div class="ann-icon-wrap">
        <i class="fas <?= $icon ?>"></i>
    </div>
    <div class="ann-body">
        <div class="ann-meta-top">
            <span class="ann-posted-by">
                <i class="fas fa-user-circle"></i> <?= esc($a['posted_by']) ?>
            </span>
            <span class="ann-age"><?= $age ?></span>
        </div>
        <h4 class="ann-title"><?= esc($a['title']) ?></h4>
        <p class="ann-text"><?= esc($a['body']) ?></p>
        <div class="ann-footer">
            <span class="ann-date">
                <i class="fas fa-clock"></i> <?= date('F d, Y', strtotime($a['created_at'])) ?>
            </span>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>

<!-- PAGINATION -->
<?php if($total > 5): ?>
<div class="ann-pagination">
    <?= $pager->links('default', 'ann_pager') ?>
</div>
<?php endif; ?>

<?= $this->endSection() ?>