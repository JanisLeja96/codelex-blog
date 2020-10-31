<?php if (isset($_SESSION['auth_id'])): ?>
    <form method="post" action="/logout">
        <button type="submit">Log out</button>
    </form>
<?php endif; ?>

<div>
    <form method="get" action="/articles/create">
        <button type="submit">Create New Article</button>
    </form>
</div>


<h1>Articles</h1>

<?php foreach ($articles as $article): ?>
    <h3>
        <a href="/articles/<?php echo $article->id(); ?>">
            <?php echo $article->title(); ?>
        </a>
    </h3>
    <p><?php echo $article->content(); ?></p>
    <p>
        <small>
            <?php echo $article->createdAt(); ?>
        </small>
    </p>
<?php endforeach; ?>
