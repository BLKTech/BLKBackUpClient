<?php
    require_once __DIR__ . '/src/Kito/Loader/AbstractLoader.php';

    require_once __DIR__ . '/src//Kito/Loader/PSR0Loader.php';
    $cacheLoader = new \Kito\Loader\PSR0Loader(__DIR__);
    $cacheLoader->register();

    require_once __DIR__ . '/src/Kito/Loader/BLKLoader.php';
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

    //** FIX ME, FIND BEST WAY TO SCAN DRIVES ON WINDOWS **//
    function getRootDirs(): array
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $drives = array();
            foreach (range('A', 'Z') as $drive)
            {
                if(is_dir($drive . ":" . DIRECTORY_SEPARATOR))
                {
                    $drives[] = $drive . ":" . DIRECTORY_SEPARATOR;
                }
            }
            return $drives;
        } else {
            return array('/');
        }
    }

    var_dump(getIdMachine());
    var_dump(getRootDirs());
    
