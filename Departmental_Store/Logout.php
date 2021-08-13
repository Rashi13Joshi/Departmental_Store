<?php
session_start();
session_destroy();

header('Location: Store.php');
?>
