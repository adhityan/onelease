<?php

require_once('../util.php');
Util::getFullPOST();

if(isset($_POST['username'])) $username = $_POST['username'];
else Util::returnJSON(array('status' => false, 'message' => 'Missing parameter `username`!'));

if(isset($_POST['password'])) $password = $_POST['password'];
else Util::returnJSON(array('status' => false, 'message' => 'Missing parameter `password`!'));

Util::returnJSON(array('status' => false, 'message' => 'No such user exits!'));

?>