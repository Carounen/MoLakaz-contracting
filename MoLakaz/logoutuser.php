<?php
session_start();
//delete the two session variables “fn” and “cid”
unset($_SESSION["fn"]);
unset($_SESSION["cid"]);
//destroy the session variable
session_destroy();
//redirect to home page
header("Location: index.php");
?>