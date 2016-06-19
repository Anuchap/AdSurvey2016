<?php
require_once 'db.php';
$fileName = Db::getFileName($_GET['uid']);
echo Db::writeLog($_GET['uid'], $fileName, 'finished');
?>