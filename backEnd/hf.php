<?php
	function DecToHex($n)
	{
		$arr = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F');
		$first_num = $n / 16;
		$second_num = $n % 16;
		return $arr[$first_num].$arr[$second_num];
	}
	$dbh = new PDO('sqlite:hf.db');
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
		echo DecToHex($row[1]);
		echo DecToHex($row[2]);
		echo DecToHex($row[3]);
		echo DecToHex($row[4]);
	}
?>
	
