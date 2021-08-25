<?php

namespace KphpTest\Models\Posts;

use KphpTest\Infrastructure\Db;

class PostsStorage
{
    private static ?PostsStorage $instance = null;

    private Db $db;

    private function __construct(Db $db)
    {
        $this->db = $db;
    }

    public static function getInstance(): PostsStorage
    {
        if (self::$instance === null) {
            self::$instance = new self(Db::getInstance());
        }

        return self::$instance;
    }

    /**
     * @return Post[]
     */
    public function getNew(int $n): array
    {
        $rawItems = $this->db->query(sprintf('SELECT * FROM posts ORDER BY id DESC LIMIT %d', $n));

        /** @var Post[] $result */
        $result = [];
        foreach ($rawItems as $item) {
            $result[] = $this->unserialize((array)$item);
        }

        return $result;
    }

    private function unserialize(array $item): Post
    {
        return (new Post())
            ->setId((int)$item['id'])
            ->setTitle((string)$item['title'])
            ->setText((string)$item['text']);
    }
}
