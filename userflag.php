<?php

session_start();

$_SESSION['flag']='true';

echo file_get_contents('user.html');


?>