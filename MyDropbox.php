<?php 
require_once 'Classes/Dropbox/autoload.php';

class MyDropbox {
	
	public function __construct() {
		$appName = 'AdServey';
		$dropboxToken = 'mHHR-Fg2KI4AAAAAAAADTOXFUykDWGFRRV0_hy2vZz2DaQXKQeLcMGtQSze-0Cg7';
		$this->client = new Dropbox\Client($dropboxToken, $appName , 'UTF-8');
	}
	
	public function uploadFile($fileName) {
		$file = fopen('uploads/' . $fileName, 'r');
		$size = filesize('uploads/' . $fileName);
		$this->client->uploadFile('/AdServey/Completed/' . $fileName, Dropbox\WriteMode::add(), $file, $size);
	}
}
