<?php
	$dbh = new PDO('sqlite:eb2.db');
	$pContent = $dbh->query('select count(*) from data');
	$result = $pContent->fetch();
	$num = $result[0];
	if($num > 50)
		$num = 50;
	echo $num."|";
	foreach($dbh->query('select * from data order by id desc limit 50') as $row)
	{
		echo "$row[1]" . "|" ;
		echo "$row[3]" . "|" ;
	}
?>
	
