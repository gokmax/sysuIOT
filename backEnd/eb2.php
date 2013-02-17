<?php
	$dbh = new PDO('sqlite:eb2.db');
	foreach($dbh->query('select * from data order by id desc limit 1') as $row)
	{
		echo "$row[1]" . "|" ;
		echo "$row[3]" . "|" ;
	}
?>
	
