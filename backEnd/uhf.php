<?php
	function DecToHex($n)
	{
		$arr = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F');
		$first_num = $n / 16;
		$second_num = $n % 16;
		return $arr[$first_num].$arr[$second_num];
	}
	$dbh = new PDO('sqlite:uhf.db');
	foreach($dbh->query('select * from data order by id desc limit 1') as $row)
	{
		echo DecToHex($row[1]);
		echo DecToHex($row[2]);
		echo DecToHex($row[3]);
		echo DecToHex($row[4]);
		echo DecToHex($row[5]);
		echo DecToHex($row[6]);
		echo DecToHex($row[7]);
		echo DecToHex($row[8]);
		echo DecToHex($row[9]);
		echo DecToHex($row[10]);
		echo DecToHex($row[11]);
	}
?>
	
