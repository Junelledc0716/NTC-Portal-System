<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="page-header">
    <h1>Account Settings</h1>
    <p class="date-text">Manage your personal information and preferences</p>
</div>
<!-- Profile Picture -->
<div class="settings-card">
    <h3>Profile Picture</h3>
    <div class="profile-pic-wrap">
        <?php $pic = $student['profile_pic'] ?? 'default.png'; ?>
        <img src="<?= base_url('uploads/profiles/'.$pic) ?>" onerror="this.src='<?= base_url('img/default.png') ?>'" id="preview">
        <form action="<?= base_url('accountsettings/uploadpic') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="file" name="profile_pic" accept="image/*" onchange="previewPic(event)" style="margin-bottom:10px;display:block">
            <button type="submit" class="btn-save">Upload Photo</button>
        </form>
    </div>
</div>

<!-- Profile Info -->
<div class="settings-card">
    <h3>Personal Information</h3>
    <form action="<?= base_url('accountsettings/update') ?>" method="POST">
        <?= csrf_field() ?>
        <div class="form-row">
            <div class="form-field">
                <label>Full Name</label>
                <input type="text" name="full_name" value="<?= esc($student['full_name']) ?>" required>
            </div>
            <div class="form-field">
                <label>Student ID</label>
                <input type="text" value="<?= esc($student['student_id']) ?>" disabled>
            </div>
        </div>
        <div class="form-field">
            <label>Email Address</label>
            <input type="email" name="email" value="<?= esc($student['email']) ?>">
        </div>
        <h3 style="margin-top:20px;padding-top:20px;border-top:1px solid var(--border)">Change Password</h3>
        <div class="form-row">
            <div class="form-field">
                <label>New Password</label>
                <input type="password" name="new_password" placeholder="Leave blank to keep current">
            </div>
            <div class="form-field">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" placeholder="Confirm new password">
            </div>
        </div>
        <button type="submit" class="btn-save">Save Changes</button>
    </form>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
function previewPic(e) {
    document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
}
</script>
<?= $this->endSection() ?>