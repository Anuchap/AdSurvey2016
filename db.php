<?php 
date_default_timezone_set('Asia/Bangkok');
require 'Classes/rb.php';
R::setup('mysql:host=localhost;dbname=adsurvey2', 'root', 'morningM00n');
//R::setup('mysql:host=mysql.hostinger.in.th;dbname=u610504232_as', 'u610504232_as', 'P@ssw0rd'); //adsurvey2
//R::setup('mysql:host=mysql.hostinger.in.th;dbname=u147007146_as', 'u147007146_as', 'P@ssw0rd'); //adsurvey

class Db {
	public static function getFileName($uid) {
		return  R::getCell('select filename from log where agency_id = ? order by id desc limit 1', [$uid]);
	}
    
    public static function getStatus($uid) {
        return R::getCell('select status from log where agency_id = ? order by id desc limit 1', [$uid]);
    }
	
	public static function writeLog($uid, $fileName, $status) {
		if($status == 'uploaded') {
			$id = R::getCell('select id from log where agency_id = ? and status = "started" order by id desc limit 1', [$uid]);
			$l = R::load('log', $id);
			$l->filename = $fileName;
			R::store($l);
		}
		
		$log = R::dispense('log');
		$log->agency_id = $uid;
		$log->datetime = new DateTime();
		$log->filename = $fileName;
		$log->status = $status;
		return R::store($log); 
	}
	
	public static function sendAnswer($uid, $qno, $answer, $optional) {
		$id = R::getCell('select id from answer where agency_id = ? and qno = ? order by id desc limit 1', [$uid, $qno]);
		
		if(empty($id)) {
			$ans = R::dispense('answer');
			$ans->agency_id = $uid;
			$ans->datetime = new DateTime();
			$ans->qno = $qno;
			$ans->answer = $answer;
			$ans->optional = $optional;
			return R::store($ans);
		} else {
			$ans = R::load('answer', $id);
			$ans->answer = $answer;
			$ans->optional = $optional;
			return R::store($ans);
		}
	}
}
?>
