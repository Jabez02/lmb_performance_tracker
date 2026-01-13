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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="img/denr.png">
</head>
<body>
    <h1>Login</h1>
     
    <?php if(!empty($errors)):?>
        <?php foreach($errors as $error) :?>
            <div style="color: red;">
                <p><?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php endforeach ;?>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button type="submit">Login</button>
    </form>
</body>
</html>