<?php
	$dbh = new PDO('sqlite:eb5.db');
	if($dbh)
	{
		//echo 'OK' . "|";
	}
	else
	{
		//echo 'Err' . "|";
	}
	foreach($dbh->query('select * from data order by id desc limit 1') as $row)
	{
		echo "$row[1]" . "|" ;
		echo "$row[2]" . "|" ;
		echo "$row[3]" . "|" ;
		echo "$row[4]" . "|" ;
	}
?>
	
