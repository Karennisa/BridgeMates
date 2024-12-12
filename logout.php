<?php
session_start();

// Hapus session untuk logout
session_unset();
session_destroy();

// Redirect ke halaman login
header("Location: index.php");
exit();
?>
