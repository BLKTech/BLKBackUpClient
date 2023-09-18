<?php

require_once __DIR__ . '/lib/Kito/Loader/AbstractLoader.php';

require_once __DIR__ . '/lib/Kito/Loader/PSR0Loader.php';
$cacheLoader = new \Kito\Loader\PSR0Loader(__DIR__ . DIRECTORY_SEPARATOR . 'lib');
$cacheLoader->register();

require_once __DIR__ . '/lib/Kito/Loader/BLKLoader.php';
$blkLoader = new \Kito\Loader\BLKLoader($cacheLoader);
$blkLoader->register();
