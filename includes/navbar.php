<?php
    $role = $_SESSION['role'];
    $full_name = $_SESSION['full_name'];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">LMB-DENR</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
            <?php if($role === 'super_admin'): ?>
                <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Divisions</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Sections</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Activities</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Targets</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Approvals</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Logout</a></li>
            <?php endif; ?>
            <?php if($role === 'admin'): ?>
                <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Activities</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Targets</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Approvals</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Logout</a></li>
            <?php endif; ?>
            <?php if($role === 'section_head'): ?>
                <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Submit Accomplishments</a></li>
                <li class="nav-item"><a class="nav-link" href="#">My Submission</a>
                </li><li class="nav-item"><a class="nav-link" href="#">Reports</a>
                </li><li class="nav-item"><a class="nav-link" href="/lmb_performance_tracker/logout.php">Logout</a>
                </li>
            <?php endif; ?>
            </ul>

            <ul class="navbar-nav">
            <li class="nav-item">
                <span class="nav-link text-light"><?php echo htmlspecialchars($full_name); ?></span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/lmb_performance_tracker/logout.php">Logout</a>
            </li>
            
            </ul>
        </div>
    </div>
</nav>