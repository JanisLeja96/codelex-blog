<?php

namespace App\Controllers;

use App\Models\Comment;

class CommentsController
{

    public function store(array $vars)
    {
        $articleId = $vars['id'];

        if (preg_match('/^\s*$/', $_POST['author']) == 1 || preg_match('/^\s*$/', $_POST['comment']) == 1) {
            $warning = "<h2 style='color: red'>Fields cannot be empty</h2>";
            header('Location: /articles/'.$articleId); //TODO DISPLAY WARNING FOR FAILED VALIDATION
        } else {
            $commentQuery = query()
                ->insert('comments')
                ->values([
                    'article_id' => ':articleId',
                    'author' => ':author',
                    'comment' => ':comment'
                ])
                ->setParameter('articleId', $articleId)
                ->setParameter('author', $_POST['author'])
                ->setParameter('comment', $_POST['comment'])
                ->execute();

            header("Location: /articles/{$articleId}");
        }
    }
}