<?php

require_once __DIR__ . '/../vendor/autoload.php';

$routes = [
    '^/api/v1/posts$' => static fn() => (new \KphpTest\Controllers\PostsController())->getNew(),
];

$uri = $_SERVER['REQUEST_URI'];

$result = null;
foreach ($routes as $route => $closure) {
    if (preg_match('~' . $route . '~', $uri, $matches) === 1) {
        $result = $closure();
    }
}

if ($result !== null) {
    header("Content-type: application/json; charset=utf-8");
    echo json_encode($result);
}
