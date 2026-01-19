<?php  

include_once '../includes/auth.php';
requireLogin();

checkRole(['super_admin' && 'admin']);
$pageTitle = "Admin Dashboard";

include_once '../includes/header.php';
include_once '../includes/navbar.php';
?>

<div class="container mt-4">
    <h1>Welcome, <?php echo htmlspecialchars ($_SESSION['full_name']);?>!</h1>

    <?php if($_SESSION['role'] === "admin"): ?>
        <p>Division ID: <?php echo $_SESSION['division_id']; ?></p>
    <?php endif; ?>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Pending</h5>
                    <p class="display-4">0</p>
               </div>
            </div>
        </div>
    
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Approved</h5>
                    <p class="display-4">0</p>
               </div>
            </div>
        </div>
   
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Rejected</h5>
                    <p class="display-4">0</p>
               </div>
            </div>
        </div>
    
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Sections</h5>
                    <p class="display-4">0</p>
               </div>
            </div>
        </div>
    </div>
    

</div>

<?php include_once '../includes/footer.php';?>

