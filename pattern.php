<?php
$str = 'NITIN';
$space = intval(strlen($str)/2);
for($i = 0; $i < strlen($str); $i++)
{
	if($i!=$space)
	{
		for($j = 0; $j < $space; $j++)
		{
		 echo "&nbsp;";
		}
		 echo $str[$i];
	}
	else
	{
		echo $str;
	}
	echo "<br>";
}
?>

