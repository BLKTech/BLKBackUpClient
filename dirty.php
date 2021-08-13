<?php

function uploadFile(string $filename, string $serverURL, int $bufferSize = 8192)
{
    if (!file_exists($filename))
        return false;

    if (!is_readable($filename))
        return false;

    $size = filesize($filename);
    $time = filemtime($filename);

    $handle = fopen($filename, "rb");

    if ($handle === FALSE)
        return false;

    while (!feof($handle))
    {
        $chunk = fread($handle, $bufferSize);
    }

    fclose($handle);
}
