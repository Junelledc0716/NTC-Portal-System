<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="page-header"><h1></i>  My Schedule</h1><p class="date-text">Your enrolled courses this semester</p></div>
<div class="schedule-grid">
<?php foreach($courses as $c): ?>
<div class="schedule-card" style="border-top-color: <?= $c['color'] ?>">
    <div class="time-badge"><i class="fas fa-clock"></i> <?= esc($c['schedule_time']) ?></div>
    <div class="course-code" style="color:<?= $c['color'] ?>;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px"><?= esc($c['course_code']) ?></div>
    <h4 style="font-size:15px;font-weight:700;margin-bottom:10px"><?= esc($c['course_name']) ?></h4>
    <p style="font-size:13px;color:var(--text-muted);margin-bottom:4px"><i class="fas fa-user"></i> <?= esc($c['instructor']) ?></p>
    <p style="font-size:13px;color:var(--text-muted);margin-bottom:4px"><i class="fas fa-calendar"></i> <?= esc($c['schedule_days']) ?></p>
    <p style="font-size:13px;color:var(--text-muted)"><i class="fas fa-map-marker-alt"></i> <?= esc($c['room']) ?></p>
</div>
<?php endforeach; ?>
</div>
<?= $this->endSection() ?>