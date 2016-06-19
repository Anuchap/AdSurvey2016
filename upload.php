<?php
define ('SITE_ROOT', realpath(dirname(__FILE__)));
require_once 'db.php';

if(empty($_POST['uid'])) {
	echo 'Sorry, please verify url..';
	exit;
}

$fileType = pathinfo(basename($_FILES['file']['name']), PATHINFO_EXTENSION);
if($fileType != 'xls' && $fileType != 'xlsx') {
    echo 'Sorry, only xls & xlsx files are allowed.';
    exit;
}

$fileName = Db::getfilename($_POST['uid']);
if($fileName == null)  {
    $fileName = $_POST['uid'] . '_1.' . $fileType;
} else {
    $num = (int)explode('_', explode('.', $fileName)[0])[1];
	$num++;
	$fileName = str_replace($num-1, $num, $fileName);
}

$targetFile = SITE_ROOT.'/uploads/'.$fileName;

if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
	
	Db::writeLog($_POST['uid'], $fileName, 'uploaded');
	
	echo 'Uploaded to ' . $targetFile;
} else {
	echo 'Sorry, there was an error uploading your file.';
}
?>
