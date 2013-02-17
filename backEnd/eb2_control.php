<?php
	$dbh = new PDO('sqlite:eb2_control.db');
	if($dbh)
	{
		//echo 'OK' . "|";
	}
	else
	{
		//echo 'Err' . "|";
	}
	$str = $_SERVER['QUERY_STRING'];
	//echo $str;
	$size = strlen($str);
	$n = 0;
	$begin = 0;
	$arg = array(0,0,0,0,0);
	for($i = 0 ; $i < $size ; $i ++)
	{
		if("$str[$i]" == "=")
		{
			$begin = 1;
		}
		else if("$str[$i]" == "&")
		{
			$begin = 0;
			$n ++;
		}
		else if("$begin" == "1")
		{
			$arg[$n] = $arg[$n] . $str[$i];
		}
	}
	/*
	echo $arg[0];
	echo $arg[1];
	echo $arg[2];
	echo $arg[3];
	echo $arg[4];
	*/
	$mes = "null,"."$arg[0]".","."$arg[1]".","."$arg[2]".","."$arg[3]".","."$arg[4]";
	$dbh->exec("insert into data(id,c1,c2,c3,c4,c5) values("."$mes".")");
	include 'Shows.html';
?>
