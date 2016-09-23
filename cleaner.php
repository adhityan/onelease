<?php

$header = file_get_contents('header.php');
$footer = file_get_contents('footer.php');

$directory = new RecursiveDirectoryIterator('./');
$iterator = new RecursiveIteratorIterator($directory);
$regex = new RegexIterator($iterator, '/^.+\.html$/i', RecursiveRegexIterator::GET_MATCH);
$objects = array_keys(iterator_to_array($regex));

foreach($objects as $object) {
    echo $object.' ';
    $file = file_get_contents($object);

    if(strpos($file, $header) !== false) {
        $file = str_replace($header, '', $file);
        echo 'H ';
    }
    else echo 'X ';

    if(strpos($file, $footer) !== false) {
        $file = str_replace($footer, '', $file);
        echo 'F';
    }
    else echo 'X';

    file_put_contents($object, $file);
    echo PHP_EOL;
    break;
}

?>