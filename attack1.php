<?php
    $file = fopen("info.txt", "a");
    fwrite("\n");
    foreach($_REQUEST as $key => $value)
    {
        fwrite($file, $key . $value . "\n");
    }
    fwrite("\n");
    fclose($file);
?> 