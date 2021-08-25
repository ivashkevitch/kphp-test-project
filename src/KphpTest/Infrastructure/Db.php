<?php

namespace KphpTest\Infrastructure;

class Db
{
    private static ?Db $instance = null;

    /** @var \mysqli */
    private \mysqli $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect('127.0.0.1', 'fake2', 'fake2', 'kphp_test', 3306);
        mysqli_query($this->connection, 'set names utf8');
    }

    public static function getInstance(): Db
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function query(string $sql): array
    {
        $mysqli_result = mysqli_query($this->connection, $sql);
        $result = [];
        if ($mysqli_result !== false) {
            while ($res = mysqli_fetch_array($mysqli_result, MYSQLI_ASSOC)) {
                $result[] = $res;
            }
        }
        return $result;
    }
}