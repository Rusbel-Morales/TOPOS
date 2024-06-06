<?php
session_start();
session_unset();
session_destroy();
header("../html/administrator/login.html");
exit();
?>
