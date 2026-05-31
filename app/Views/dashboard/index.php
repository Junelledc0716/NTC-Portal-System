<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <div>
        <h1>Welcome, <?= esc(session()->get('student_name')) ?>!</h1>
        <p class="date-text"><?= date('d M Y, l') ?> &nbsp;|&nbsp; Semester <?= session()->get('semester') ?> of 3  </p>
    </div>
</div>

<!-- Banner -->
<div class="banner-card">
    <div class="banner-text">
        <h2>Stay on Top of Your Goals!</h2>
        <p>Check your schedule, submit homeworks on time, and review your upcoming exams. You've got this!</p>
        <a href="<?= base_url('schedule') ?>" class="btn-primary">View Schedule <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="banner-art">
    <img src="<?= base_url('img/banner.png') ?>" alt="Banner" class="banner-img">
</div>
</div>

<div class="dashboard-grid">
    <!-- Enrolled Courses -->
    <div class="grid-main">
        <div class="section-header">
            <h3><i class="fas fa-book"></i> Enrolled Courses</h3>
            <a href="<?= base_url('enrolledcourses') ?>">View all →</a>
        </div>
        <div class="courses-grid">
            <?php foreach(array_slice($courses, 0, 4) as $c): ?>
            <div class="course-card" style="border-top: 4px solid <?= $c['color'] ?>">
                <div class="course-code" style="color:<?= $c['color'] ?>"><?= esc($c['course_code']) ?></div>
                <h4><?= esc($c['course_name']) ?></h4>
                <p><i class="fas fa-user"></i> <?= esc($c['instructor']) ?></p>
                <p><i class="fas fa-calendar"></i> <?= esc($c['schedule_days']) ?></p>
                <p><i class="fas fa-clock"></i> <?= esc($c['schedule_time']) ?></p>
                <p><i class="fas fa-map-marker-alt"></i> <?= esc($c['room']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Exam Board Preview -->
        <div class="section-header mt-20">
            <h3><i class="fas fa-clipboard-list"></i> Exam Board</h3>
            <a href="<?= base_url('examboard') ?>">View all →</a>
        </div>
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr><th>Exam Name</th><th>Course</th><th>Date</th><th>Time</th><th>Location</th><th>Status</th></tr>
                </thead>
                <tbody>
                    <?php foreach($exams as $e): ?>
                    <tr>
                        <td><?= esc($e['exam_name']) ?></td>
                        <td><?= esc($e['course_code']) ?></td>
                        <td><?= date('M d, Y', strtotime($e['exam_date'])) ?></td>
                        <td><?= esc($e['exam_time']) ?></td>
                        <td><?= esc($e['location']) ?></td>
                        <td><span class="badge <?= $e['status'] === 'Completed' ? 'badge-green' : 'badge-blue' ?>"><?= $e['status'] ?></span></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Sidebar right -->
    <div class="grid-side">
        <!-- Mini Calendar -->
        <div class="widget-card">
            <div class="widget-header"><i class="fas fa-calendar"></i> <?= date('F Y') ?></div>
            <div class="mini-calendar">
                <div class="cal-days-header">
                    <?php foreach(['Mo','Tu','We','Th','Fr','Sa','Su'] as $d): ?>
                        <span><?= $d ?></span>
                    <?php endforeach; ?>
                </div>
                <?php
                $today = date('j');
                $firstDay = date('N', strtotime(date('Y-m-01')));
                $daysInMonth = date('t');
                $cells = $firstDay - 1;
                echo '<div class="cal-grid">';
                for($i = 0; $i < $cells; $i++) echo '<span></span>';
                for($d = 1; $d <= $daysInMonth; $d++) {
                    $cls = $d == $today ? 'today' : '';
                    echo "<span class='$cls'>$d</span>";
                }
                echo '</div>';
                ?>
            </div>
        </div>

        <!-- Homeworks -->
        <div class="widget-card">
            <div class="widget-header"><i class="fas fa-book-open"></i> Homeworks <a href="<?= base_url('homeworks') ?>">View all →</a></div>
            <?php foreach($homeworks as $hw): ?>
            <div class="hw-item">
                <div class="hw-top">
                    <span class="hw-course" style="color:<?= $hw['color'] ?>"><?= esc($hw['course_code']) ?></span>
                    <span class="badge <?= $hw['status'] === 'Completed' ? 'badge-green' : ($hw['status'] === 'In Progress' ? 'badge-yellow' : 'badge-red') ?>"><?= $hw['status'] ?></span>
                </div>
                <p class="hw-name"><?= esc($hw['assignment_name']) ?></p>
                <p class="hw-due">Due: <?= date('F d, Y', strtotime($hw['due_date'])) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
