<?php
?>

<h1>Register</h1>
<div style="display: inline-block;">
    <form method="post" action="/register?r=<?php echo $_GET['r']?>">
        <label style="display: block" for="name">Name</label>
        <input name="name" required>

        <label style="display: block" for="email">E-mail</label>
        <input name="email" type="email" required>

        <label style="display: block" for="password">Password</label>
        <input name="password" type="password" required>

        <label style="display: block" for="confirm_password">Confirm Password</label>
        <input name="confirm_password" type="password" required>

        <button style="display:block; margin-top: 10px; margin-right: 0; margin-left: auto" type="submit">Register
        </button>
    </form>
</div>
<?php if (isset($warning)): ?>
    <?php echo $warning; ?>
<?php endif; ?>
