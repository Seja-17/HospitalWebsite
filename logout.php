<?php
// Delete the cookie by setting its expiration in the past
setcookie("user_email", "", time() - 3600, "/");
session_start();
session_destroy();

header("Location: login.html");
exit();
?>
