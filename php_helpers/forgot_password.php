<?php

require_once('../util.php');
Util::getFullPOST();

if(isset($_POST['username'])) $username = $_POST['username'];
else Util::returnJSON(array('status' => false, 'message' => 'Missing parameter `username`!'));

Util::returnJSON(array('status' => false, 'message' => 'No such user exits!'));

?>