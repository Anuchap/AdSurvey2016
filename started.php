<?php
require_once 'db.php';
$fileName = Db::getfilename($_GET['uid']);
echo Db::writeLog($_GET['uid'], $fileName, 'started');
?>