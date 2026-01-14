<?php
    include_once 'includes/auth.php';

    if (isLoggedIn()) {
        $role = $_SESSION['role'];
        switch ($role) {
            case 'super_admin':
            case 'admin':
                header('Location: admin/dashboard.php');
                exit();
            case 'section_head':
                header('Location: user/dashboard.php');
                exit();
            }
        }

    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $errors = [];
        //username validation
        if (empty($username)) {
            $errors[] = "Username is required"; 
        }

        //password validation
        if (empty($password)) {
            $errors[] = "Password is required";
        }
        
        if (empty($errors)) {
            $result = login($username, $password);

            if ($result) {
                $role = $_SESSION['role'];
                    switch ($role) {
                    case 'super_admin':
                    case 'admin':
                        header('Location: admin/dashboard.php');
                        exit();
                    case 'section_head':
                        header('Location: user/dashboard.php');
                        exit();
                
                }
            } else {
                $errors[] = 'Invalid username or password';
            }
        }    
    }
?>

<?php 
    include_once 'includes/header.php';
    include_once 'views/login_view.php';
    include_once 'includes/footer.php';
?>