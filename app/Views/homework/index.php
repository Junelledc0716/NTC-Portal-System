<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="page-header">
    <h1>Homeworks</h1>
    <p class="date-text">Track and submit your assignments</p>
</div>
<div class="hw-list">
<?php foreach($homeworks as $hw): ?>
<div class="hw-card" style="border-left-color:<?= $hw['color'] ?>">
    <div class="hw-card-info">
        <h4><?= esc($hw['assignment_name']) ?></h4>
        <p><?= esc($hw['course_code']) ?> — <?= esc($hw['course_name']) ?></p>
        <p>Due: <?= date('F d, Y', strtotime($hw['due_date'])) ?></p>
    </div>
    <div style="display:flex;align-items:center;gap:12px">
        <span class="badge <?= $hw['status']==='Completed'?'badge-green':($hw['status']==='In Progress'?'badge-yellow':'badge-red') ?>"><?= $hw['status'] ?></span>
        <?php if($hw['status'] !== 'Completed'): ?>
        <form action="<?= base_url('homeworks/upload/'.$hw['id']) ?>" method="POST" enctype="multipart/form-data" class="hw-upload-form">
            <?= csrf_field() ?>
            <input type="file" name="homework_file" class="btn-upload" required>
            <button type="submit" class="btn-submit">Submit</button>
        </form>
        <?php else: ?>
        <span style="font-size:12px;color:var(--success)"><i class="fas fa-check-circle"></i> Submitted</span>
        <?php endif; ?>
    </div>
</div>
<?php endforeach; ?>
</div>
<?= $this->endSection() ?>