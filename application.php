<?php

$load = trim($_GET['load']);
$file = realpath(null).'/'.$load;

if(file_exists($file)) {
    require_once('header.php');
    require_once($file);
    require_once('footer.php');
}
else echo "invalid resource";

?>