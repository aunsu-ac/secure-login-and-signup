<?php
session_start();
// session_destroy();
unset($_SESSION['is_login']);
unset($_SESSION['fname']);
header("Location: index.php");

?>