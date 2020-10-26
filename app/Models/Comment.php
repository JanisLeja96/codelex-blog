<?php

namespace App\Models;

class Comment
{
    private int $id;
    private int $article_id;
    private string $author;
    private string $comment;
    private string $createdAt;

    public function __construct(
        int $id,
        int $article_id,
        string $author,
        string $comment,
        string $createdAt
    )
    {
        $this->id = $id;
        $this->article_id = $id;
        $this->author = $author;
        $this->comment = $comment;
        $this->createdAt = $createdAt;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function articleId(): int
    {
        return $this->article_id;
    }

    public function author(): string
    {
        return $this->author;
    }

    public function comment(): string
    {
        return $this->comment;
    }

    public function createdAt(): string
    {
        return $this->createdAt;
    }
}