<a href="/">Back</a>
<h1><?php echo $article->title(); ?></h1>
<p><?php echo $article->content(); ?></p>
<p>
    <small>
        <b><?php echo $article->createdAt(); ?></b>
    </small>
</p>
<p>
    Tags:
    <?php foreach ($tags as $tag) :?>
    <strong><?php echo $tag->tag() . ' '; ?></strong>
    <?php endforeach;?>
</p>

<hr>
<h2>Comments</h2>
<ul>

    <?php foreach ($comments as $comment) : ?>
        <li>
            <div style="display: inline-block;">
                <?php echo "<strong>{$comment->author()}:</strong> {$comment->comment()} <small>{$comment->createdAt()}</small>"; ?>
            </div>
            <div style="display: inline-block">
                <form method="post" action="/articles/<?php echo $article->id(); ?>/comments/<?php echo $comment->id()?>">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit">Remove</button>
                </form>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
<h2>Add new comment</h2>
<?php if (isset($warning)) : ?>
    <?php echo $warning; endif; ?>
<form method="post" action="/articles/<?php echo $article->id() ?>/comments">
    Name:<input type="text" name="author" style="margin-left: 25px;"><br>
    Comment:<textarea name="comment" rows="6"></textarea><br>
    <button type="submit" style="margin-left: 190px;">Submit</button>
</form>