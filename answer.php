<?php
require_once 'db.php';
$r = json_decode(file_get_contents("php://input"));
echo Db::sendAnswer($r->uid, $r->qno, $r->answer, $r->optional);
?>