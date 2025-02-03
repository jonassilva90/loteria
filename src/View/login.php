<?php 
$title = "Login";
?><div>
    <h1>Login</h1>
    <form action="/login" method="POST">
        <input class="form-input" type="text" name="username" placeholder="Usuário" value="jonas">
        <input class="form-input" type="password" name="password" placeholder="Password" value="123456">
        <button class="btn btn-primary" type="submit">Login</button>
    </form>
    <?php 
    if(isset($error) && !empty($error)): ?>
        <div class="text-error">
            <?= $error ?>
        </div>
        <?php if(isset($message) && !empty($message)): ?>
        <div>
            <?= $code??0 ?>: <?= $message ?>
        </div>
        <?php endif; ?>
    <?php endif; ?>
</div>