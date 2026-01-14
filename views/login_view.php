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