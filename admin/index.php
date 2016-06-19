<?php 
if($_POST['password'] != 'P@ssw0rd') {
	echo 'Password incorrect. <a href="login.html">Back</a>';
	exit();
}

$conn = new PDO('mysql:host=localhost;dbname=adsurvey', 'root', '');
//$conn = new PDO('mysql:host=mysql.hostinger.in.th;dbname=u147007146_as', 'u147007146_as', 'P@ssw0rd');
?>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>

<?php $sql = 'select * from log order by id '; ?>
<h2>Logs</h2>
<table>
	<thead>
		<tr><th>Seq.</th><th>UID</th><th>Time</th><th>Status</th><th>File</th></tr>
	</thead>
	<tbody>
	<?php 	foreach($conn->query($sql) as $row) { ?>
		<tr>
			<td><?=$row['id'] ?></td>
			<td><?=$row['uid'] ?></td>
			<td><?=$row['datetime'] ?></td>
			<td><?=$row['status'] ?></td>
			<?php if($row['status'] == 'finished') { ?>
				<td><a href="../completed/<?=$row['filename'] ?>"><?=$row['filename'] ?></a></td>
			<?php } else { ?>
				<td><a href="../uploads/<?=$row['filename'] ?>"><?=$row['filename'] ?></a></td>
			<?php } ?>
		</tr>
	<?php } ?>
	</tbody>
</table>

<?php 
$sql = 'select * from answer order by id';
$list = [];
foreach($conn->query($sql) as $row) { 

	switch($row['qno']) {
		case 1:
			$list[$row['uid']]['uid'] = $row['uid'];
			$list[$row['uid']]['q1'] = $row['answer'];
			$list[$row['uid']]['q1opt'] = $row['optional'];
			$list[$row['uid']]['timestart'] =$row['datetime'];
			break;
		case 2:
			$list[$row['uid']]['q2'] = $row['answer'];
			$list[$row['uid']]['q2opt'] = $row['optional'];
			break;
		case 3:
			$list[$row['uid']]['q3'] = $row['answer'];
			break;
		case 4:
			$list[$row['uid']]['q4'] = $row['answer'] . ',' .  abs(100 - ((int)$row['answer']));
			$list[$row['uid']]['timefinish'] = $row['datetime'];
			break;
	}

}

$i = 1;
//var_dump($list);
?>

<h2>Answer</h2>
<table>
	<thead>
		<tr>
			<th>No.</th>
			<th>UID</th>
			<th>Time Start</th>
			<th>Time Finish</th>
			<th>Q.1</th>
			<th>Q.1 Optional</th>
			<th>Q.2</th>
			<th>Q.2 Optional</th>
			<th>Q.3</th>
			<th>Q.4 (Digital, Offline)</th>
		</tr>
	</thead>
	<tbody>
	<?php 	foreach($list as $item) { ?>
		<tr>
			<td><?=$i++ ?></td>
			<td><?=$item['uid'] ?></td>
			<td><?=$item['timestart'] ?></td>
			<td><?=$item['timefinish'] ?></td>
			<td><?=$item['q1'] ?></td>
			<td><?=$item['q1opt'] ?></td>
			<td><?=$item['q2'] ?></td>
			<td><?=$item['q2opt'] ?></td>
			<td><?=$item['q3'] ?></td>
			<td><?=$item['q4'] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>

<?php $sql = 'select * from answer order by id '; ?>
<h2>Answer 2</h2>
<table>
	<thead>
		<tr><th>Seq.</th><th>UID</th><th>Time</th><th>QuestionNo</th><th>Answer</th><th>Optional</th></tr>
	</thead>
	<tbody>
	<?php 	foreach($conn->query($sql) as $row) { ?>
		<tr>
			<td><?=$row['id'] ?></td>
			<td><?=$row['uid'] ?></td>
			<td><?=$row['datetime'] ?></td>
			<td><?=$row['qno'] ?></td>
			<td><?=$row['answer'] ?></td>
			<td><?=$row['optional'] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>



