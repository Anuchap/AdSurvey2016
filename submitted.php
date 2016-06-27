<?php
define ('SITE_ROOT', realpath(dirname(__FILE__)));
require_once 'db.php';
//session_start();

$fileName = Db::getFileName($_GET['uid']);
$sourceFile = SITE_ROOT.'/uploads/'.$fileName;
$destFile = SITE_ROOT.'/completed/'.$fileName;

if (copy($sourceFile, $destFile)) {
	Db::writeLog($_GET['uid'], $fileName, 'submitted');
	echo 'Copy to ' . $destFile;
} else {
	echo 'Sorry, there was an error copy your file.';
}

//$disciplines = $_SESSION['disciplines'];
//insert discipline
//insert sub_discipline 
//print_r($disciplines);
?>