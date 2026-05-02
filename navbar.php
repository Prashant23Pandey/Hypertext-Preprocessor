<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">AppPortal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if(isset($_SESSION['user_id'])): ?>
                <?php if($_SESSION['role'] === 'admin'): ?>
            <li class="nav-item"><a class="nav-link" href="admin_dashboard.php">Admin Panel</a></li>
                <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="user_dashboard.php">My Profile</a></li>
                <?php endif; ?>
            <li class="nav-item"><a class="btn btn-sm btn-danger ms-2" href="logout.php">Logout</a></li>
                <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <?php endif; ?>
</ul>
        </div>
    </div>
</nav>