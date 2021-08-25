# kphp-test-project

mysql dump:
```sql
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `posts` (`id`, `title`, `text`) VALUES
(1, 'Post 1',   'Text 1'),
(2, 'Post 2',   'Text 2'),
(3, 'Post 3',   'Post 3'),
(4, 'Post 4',   'Post 4'),
(5, 'Post 5',   'Post 5'),
(6, 'Post 6',   'Post 6'),
(7, 'Post 7',   'Post 7');
```

1. clone repo with kphp fork: https://github.com/ivashkevitch/kphp-with-mysql-and-utf-8
2. build it by this instruction: https://vkcom.github.io/kphp/kphp-internals/developing-and-extending-kphp/compiling-kphp-from-sources.html
3. build server binary: kphp/objs/bin/kphp2cpp --composer-no-dev --composer-root ./ ./www/index.php
4. run server: ./kphp_out/server -H 1337 --mysql-db-name kphp_test --mysql-host localhost --mysql-user fake2 --mysql-password fake2 --disable-mysql-same-datacenter-check --use-utf8 --workers-num 20

details (russian): https://php.zone/post/kphp-in-life