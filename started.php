<?php
require_once 'db.php';
echo Db::writeLog($_GET['uid'], '', 'started');
?>