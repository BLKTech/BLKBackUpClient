<?php
    require_once __DIR__ . '/Kito/Loader/AbstractLoader.php';

    require_once __DIR__ . '/Kito/Loader/PSR0Loader.php';
    $cacheLoader = new \Kito\Loader\PSR0Loader(__DIR__);
    $cacheLoader->register();

    require_once __DIR__ . '/Kito/Loader/BLKLoader.php';
    $blkLoader = new \Kito\Loader\BLKLoader($cacheLoader);
    $blkLoader->register();

    //** FIX ME, FIND BEST WAY TO GET UID FROM HARDWARE **//
    function getIdMachine(): string
    {        
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            return sha1(trim(shell_exec("wmic path win32_computersystemproduct get uuid /value")));
        } else {
            return sha1(trim(shell_exec("cat /etc/machine-id")));
        }        
    }



    var_dump(getIdMachine());
    
