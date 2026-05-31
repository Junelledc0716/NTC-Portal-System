<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login — Univer City Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="login-page">
<div class="login-wrapper">

    <!-- LEFT PANEL -->
 <div class="login-left">
    <div class="login-left-inner">
        <div class="login-brand-center">
            <img src="<?= base_url('img/ntc_logo.png') ?>" alt="Logo" class="login-logo">
            <h1 class="login-school-name">NTC Portal</h1>
            <p class="login-school-sub">Student Information System</p>
        </div>
        <div class="login-tagline">
            <h2>Learn. Grow. Excel.</h2>
            <p>Your academic journey, all in one place.</p>
        </div>
    </div>
</div>
    <!-- RIGHT PANEL -->
    <div class="login-right">
        <div class="login-card">
            <h3>Welcome Back!</h3>
            <p class="login-sub">Sign in to your student account</p>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('login') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label>Username</label>
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Enter your username" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Enter your password" required>
                        <span class="toggle-pass" onclick="togglePass(this)"><i class="fas fa-eye"></i></span>
                    </div>
                </div>
                <button type="submit" class="btn-login">
                    Sign In <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>

</div>
<script>
function togglePass(el) {
    const input = el.previousElementSibling;
    input.type = input.type === 'password' ? 'text' : 'password';
    el.innerHTML = input.type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
}
</script>
</body>
</html>