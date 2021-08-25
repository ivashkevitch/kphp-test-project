<?php

namespace KphpTest\Models\Posts;

class Post
{
    private int $id;

    private string $title;

    private string $text;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Post
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Post
    {
        $this->title = $title;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): Post
    {
        $this->text = $text;
        return $this;
    }
}
