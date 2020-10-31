<?php


namespace App\Models;

class Tag
{
    private int $id;
    private string $tag;

    public function __construct(
        int $id,
        string $tag
    )
    {
        $this->id = $id;
        $this->tag = $tag;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function tag(): string
    {
        return $this->tag;
    }
}