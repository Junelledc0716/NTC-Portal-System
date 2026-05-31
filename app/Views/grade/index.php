<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="modal-overlay">
    <div class="modal-box">
        <div class="modal-icon">📊</div>
        <h3>Grade Report Unavailable</h3>
        <p>Grade reports are only available at the end of the semester. Please check back after your final exams are completed.</p>
        <a href="<?= base_url('dashboard') ?>"><button class="btn-close-modal">Back to Dashboard</button></a>
    </div>
</div>
<?= $this->endSection() ?>