<?php
require_once 'db.php';
echo Db::getStatus($_GET['uid']);
?>
