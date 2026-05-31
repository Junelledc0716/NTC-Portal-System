<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <div style="display:flex;align-items:center;justify-content:space-between">
        <div>
            <h1>Enrolled Courses</h1>
            <p class="date-text">Manage your enrolled subjects this semester</p>
        </div>
        <button class="btn-primary" onclick="toggleModal()">
            <i class="fas fa-plus"></i> Add Course
        </button>
    </div>
</div>

<div class="courses-list">
<?php if(empty($courses)): ?>
    <div class="empty-state">
        <i class="fas fa-book-open"></i>
        <p>No enrolled courses yet. Click <strong>Add Course</strong> to get started.</p>
    </div>
<?php else: ?>
<?php foreach($courses as $c): ?>
<div class="course-row" style="border-left-color:<?= $c['color'] ?>">
    <div class="course-row-left">
        <div class="course-color-dot" style="background:<?= $c['color'] ?>"></div>
        <div class="course-info">
            <div class="course-code-tag" style="color:<?= $c['color'] ?>"><?= esc($c['course_code']) ?></div>
            <h4><?= esc($c['course_name']) ?></h4>
            <div class="course-meta-row">
                <span><i class="fas fa-user"></i> <?= esc($c['instructor']) ?></span>
                <span><i class="fas fa-calendar"></i> <?= esc($c['schedule_days']) ?></span>
                <span><i class="fas fa-clock"></i> <?= esc($c['schedule_time']) ?></span>
                <span><i class="fas fa-map-marker-alt"></i> <?= esc($c['room']) ?></span>
            </div>
        </div>
    </div>
    <button class="btn-unenroll"
            onclick="confirmUnenroll(<?= $c['id'] ?>, '<?= esc($c['course_name']) ?>')">
        <i class="fas fa-user-minus"></i> Unenroll
    </button>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>

<!-- Hidden unenroll form -->
<form id="unenrollForm" method="POST" action="">
    <?= csrf_field() ?>
</form>

<!-- ADD COURSE MODAL -->
<div class="uc-modal-overlay" id="addCourseModal">
    <div class="uc-modal">
        <div class="uc-modal-header">
            <h3><i class="fas fa-plus-circle" style="color:var(--accent)"></i> Add Course</h3>
            <button class="uc-modal-close" onclick="toggleModal()"><i class="fas fa-times"></i></button>
        </div>
        <form action="<?= base_url('enrolledcourses/add') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="form-field">
                <label>Select Course</label>
                <select name="course_id" id="courseSelect" onchange="showCourseInfo(this)" required class="uc-select">
                    <option value="">— Choose a course —</option>
                    <?php foreach($available as $a): ?>
                    <option value="<?= $a['id'] ?>"
                            data-code="<?= esc($a['course_code']) ?>"
                            data-name="<?= esc($a['course_name']) ?>"
                            data-instructor="<?= esc($a['instructor']) ?>"
                            data-days="<?= esc($a['schedule_days']) ?>"
                            data-time="<?= esc($a['schedule_time']) ?>"
                            data-room="<?= esc($a['room']) ?>"
                            data-color="<?= esc($a['color']) ?>">
                        <?= esc($a['course_code']) ?> — <?= esc($a['course_name']) ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div id="coursePreview" class="course-preview-box" style="display:none">
                <div id="previewCode" class="preview-code"></div>
                <div id="previewName" class="preview-name"></div>
                <div id="previewDetails" class="preview-details"></div>
            </div>
            <div class="uc-modal-actions">
                <button type="button" onclick="toggleModal()" class="btn-cancel">Cancel</button>
                <button type="submit" class="btn-save">Enroll Now</button>
            </div>
        </form>
    </div>
</div>

<!-- CONFIRM UNENROLL MODAL -->
<div class="uc-modal-overlay" id="unenrollModal">
    <div class="uc-modal uc-modal-sm">
        <div class="unenroll-icon"><i class="fas fa-exclamation-triangle"></i></div>
        <h3 style="margin-bottom:8px;text-align:center">Unenroll from Course?</h3>
        <p style="color:var(--text-muted);font-size:14px;text-align:center;margin-bottom:24px" id="unenrollMsg">
            Are you sure you want to unenroll?
        </p>
        <div class="uc-modal-actions">
            <button class="btn-cancel" onclick="closeUnenroll()">Cancel</button>
            <button class="btn-unenroll-confirm" onclick="submitUnenroll()">
                <i class="fas fa-user-minus"></i> Yes, Unenroll
            </button>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
let pendingUnenrollId = null;

function toggleModal() {
    const m = document.getElementById('addCourseModal');
    m.classList.toggle('active');
}

function confirmUnenroll(id, name) {
    pendingUnenrollId = id;
    document.getElementById('unenrollMsg').textContent =
        'Are you sure you want to unenroll from "' + name + '"? This cannot be undone.';
    document.getElementById('unenrollModal').classList.add('active');
}

function closeUnenroll() {
    document.getElementById('unenrollModal').classList.remove('active');
    pendingUnenrollId = null;
}

function submitUnenroll() {
    if (!pendingUnenrollId) return;
    const form = document.getElementById('unenrollForm');
    form.action = '<?= base_url('enrolledcourses/unenroll/') ?>' + pendingUnenrollId;
    form.submit();
}

function showCourseInfo(sel) {
    const opt = sel.options[sel.selectedIndex];
    const preview = document.getElementById('coursePreview');
    if (!opt.value) { preview.style.display = 'none'; return; }
    const color = opt.dataset.color;
    preview.style.display = 'block';
    preview.style.borderLeftColor = color;
    document.getElementById('previewCode').textContent = opt.dataset.code;
    document.getElementById('previewCode').style.color  = color;
    document.getElementById('previewName').textContent  = opt.dataset.name;
    document.getElementById('previewDetails').innerHTML =
        `<span><i class="fas fa-user"></i> ${opt.dataset.instructor}</span>
         <span><i class="fas fa-calendar"></i> ${opt.dataset.days}</span>
         <span><i class="fas fa-clock"></i> ${opt.dataset.time}</span>
         <span><i class="fas fa-map-marker-alt"></i> ${opt.dataset.room}</span>`;
}

// Close modal on overlay click
document.getElementById('addCourseModal').addEventListener('click', function(e){
    if(e.target === this) toggleModal();
});
document.getElementById('unenrollModal').addEventListener('click', function(e){
    if(e.target === this) closeUnenroll();
});
</script>
<?= $this->endSection() ?>