<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Univer City Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <?= $this->renderSection('head') ?>
</head>
<body>
<div class="app-wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">
       <div class="sidebar-brand">
    <img src="<?= base_url('img/ntc_logo.png') ?>" alt="Logo" class="sidebar-logo">
    <div class="brand-text">
        <span class="brand-name">NTC Portal</span>
        <span class="brand-sub">Student Portal</span>
    </div>
</div>
        <nav class="sidebar-nav">
            <a href="<?= base_url('dashboard') ?>"      class="nav-item <?= uri_string()==='dashboard'      ?'active':'' ?>"><i class="fas fa-th-large"></i><span>Dashboard</span></a>
            <a href="<?= base_url('schedule') ?>"       class="nav-item <?= uri_string()==='schedule'       ?'active':'' ?>"><i class="fas fa-calendar-alt"></i><span>Schedule</span></a>
            <a href="<?= base_url('examboard') ?>"      class="nav-item <?= uri_string()==='examboard'      ?'active':'' ?>"><i class="fas fa-clipboard-list"></i><span>Exam Board</span></a>
            <a href="<?= base_url('homeworks') ?>"      class="nav-item <?= uri_string()==='homeworks'      ?'active':'' ?>"><i class="fas fa-book-open"></i><span>Homeworks</span></a>
            <a href="<?= base_url('gradereport') ?>"    class="nav-item <?= uri_string()==='gradereport'    ?'active':'' ?>"><i class="fas fa-chart-bar"></i><span>Grade Report</span></a>
            <a href="<?= base_url('enrolledcourses') ?>" class="nav-item <?= uri_string()==='enrolledcourses'?'active':'' ?>"><i class="fas fa-book"></i><span>Enrolled Courses</span></a>
            <a href="<?= base_url('announcements') ?>"  class="nav-item <?= uri_string()==='announcements'  ?'active':'' ?>"><i class="fas fa-bullhorn"></i><span>Announcements</span></a>
            <a href="<?= base_url('payment') ?>"        class="nav-item <?= uri_string()==='payment'        ?'active':'' ?>"><i class="fas fa-credit-card"></i><span>Payment Center</span></a>
            <a href="<?= base_url('accountsettings') ?>" class="nav-item <?= uri_string()==='accountsettings'?'active':'' ?>"><i class="fas fa-user-cog"></i><span>Account Settings</span></a>
        </nav>

        <div class="sidebar-footer">
            <a href="<?= base_url('logout') ?>" class="nav-item logout">
                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- MAIN -->
    <main class="main-content">
        <header class="topbar">
            <div class="topbar-left">
                <div class="topbar-page-title" id="pageTitle"></div>
            </div>
            <div class="topbar-search">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search...">
            </div>
            <div class="topbar-right">
                <div class="topbar-icon"><i class="fas fa-bell"></i></div>
                <div class="topbar-profile">
                    <?php $pic = session()->get('profile_pic') ?? 'default.png'; ?>
                    <img src="<?= base_url('uploads/profiles/' . $pic) ?>" alt="Profile"
                         onerror="this.src='<?= base_url('img/default.png') ?>'">
                    <span><?= esc(session()->get('student_name')) ?></span>
                </div>
            </div>
        </header>

        <div class="page-content">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            <?= $this->renderSection('content') ?>
        </div>
    </main>

</div>
<?= $this->renderSection('scripts') ?>
</body>
</html>