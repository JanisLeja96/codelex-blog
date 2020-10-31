<a href="/">Back</a>
<h1>Log in</h1>
<?php if (isset($error)): ?>
    <?php echo $error; ?>
<?php endif; ?>
<div style="display: inline-block">
    <form method="post" action="/login">
        <label for="email">E-mail</label>
        <input style="display: block" name="email" required>

        <label for="password">Password</label>
        <input style="display: block" name="password" type="password" required>

        <button onclick="window.location.href='/register'" type="button">Register</button>
        <button style="margin-top: 10px; margin-right: 0; margin-left: auto" type="submit">Log in
        </button>
    </form>
</div>
