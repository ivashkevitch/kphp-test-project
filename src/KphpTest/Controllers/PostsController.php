<?php

namespace KphpTest\Controllers;

use KphpTest\Models\Posts\Post;
use KphpTest\Models\Posts\PostsStorage;

class PostsController
{
    private PostsStorage $postsStorage;

    public function __construct()
    {
        $this->postsStorage = PostsStorage::getInstance();
    }

    public function getNew(): array
    {
        $newPosts = $this->postsStorage->getNew(5);

        return [
            'result' => array_map(static fn(Post $post) => [
                'id' => $post->getId(),
                'title' => $post->getTitle(),
                'text' => $post->getText(),
            ], $newPosts)
        ];
    }
}
