<?php
session_start();

$_SESSION['flag']='false';

echo file_get_contents("main.html");

?>