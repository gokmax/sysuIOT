<?php
	function DecToHex($n)
	{
		$arr = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F');
		$first_num = $n / 16;
		$second_num = $n % 16;
		return $arr[$first_num].$arr[$second_num];
	}
	$database_name = array("eb2.db","eb3.db","eb4.db","eb5.db","eb6.db","hf.db","uhf.db","125k.db");
	$node_name = array("NULL","ARM","433Mhz","2.4G","Zigbee","Bluetooth","HF","UHF");
	$dbh = new PDO('sqlite:total.db');
	//foreach($dbh->query('select * from data order by id desc limit 1') as $row)
	$pContent1 = $dbh->query('select count(*) from data');
	$result1 = $pContent1->fetch();
	$num_of_total = $result1[0];
	$pContent2 = $dbh->query('select * from data');
	$result2 = $pContent2->fetch();
	$count_of_database = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0);
	$serial_of_database = array(0,0,0,0,0,0);
	$index = 0;
	for($i = 0 ; $i < $num_of_total ; $i ++)
	{
		if($count_of_database[$result2[1]] == 0)
		{
			$serial_of_database[$index] = $result2[1];
			$index ++;
		}
		$count_of_database[$result2[1]] ++;
		$result2 = $pContent2->fetch();
	}

	$first_database = $serial_of_database[0];
	$dbh2 = new PDO('sqlite:'.$database_name[$first_database]);
	$pContent3 = $dbh2->query('select addr1,addr2,addr3 from data order by id desc limit 1');
	$result3 = $pContent3->fetch();
	echo $node_name[$result3[0]].'|'.DecToHex($result3[1])."|".DecToHex($result3[2]).'|';
	echo $index."|";
	for($i = 0 ; $i < $index; $i ++)
	{
		$dbhn = new PDO('sqlite:'.$database_name[$serial_of_database[$i]]);
		$pContentn = $dbhn->query('select addr4,addr5,addr6 from data order by id desc limit 1');
		$resultn = $pContentn->fetch();
		echo $serial_of_database[$i]."|".$node_name[$resultn[0]].'|'.DecToHex($resultn[1])."|".DecToHex($resultn[2])."|";
	}
?>
