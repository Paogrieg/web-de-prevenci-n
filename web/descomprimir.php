<?php

$filename = "./app.zip";
if (file_exists("./app.zip")) {
    $zip = new ZipArchive;
    if ($zip->open($filename) === TRUE) {
        $zip->extractTo('./');
        $zip->close();
        echo 'ok';
    } else {
        echo 'error';
    }
}