<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="page-header">
    <h1>Exam Board</h1>
    <p class="date-text">View your upcoming and completed examinations</p>
</div>
<div class="table-wrapper">
<table class="data-table">
    <thead><tr><th>Exam Name</th><th>Course</th><th>Date</th><th>Time</th><th>Location</th><th>Status</th></tr></thead>
    <tbody>
    <?php foreach($exams as $e): ?>
    <tr>
        <td><?= esc($e['exam_name']) ?></td>
        <td><?= esc($e['course_code']) ?></td>
        <td><?= date('M d, Y', strtotime($e['exam_date'])) ?></td>
        <td><?= esc($e['exam_time']) ?></td>
        <td><?= esc($e['location']) ?></td>
        <td><span class="badge <?= $e['status']==='Completed'?'badge-green':'badge-blue' ?>"><?= $e['status'] ?></span></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>
<?= $this->endSection() ?>