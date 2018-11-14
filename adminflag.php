<?php

session_start();

$_SESSION['flag']='true';
echo "<script>alert('working');</script>";

header('Location: admin.html');

exit;


?>