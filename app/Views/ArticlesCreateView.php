<?php if (isset($warning)): ?>
<?php echo $warning;?>
<?php endif;?>
<form method="post" action="/articles">
    Title: <input type="text" name="title" style="margin-left: 20px;"><br>
    Content: <textarea name="content" rows="4" cols="50"></textarea><br>
    <button type="submit">Create</button>
</form>
