<?php

/*
$page =1

$from =0;
$to   =5;

$page =2;

$from =5;
$to   =5;

$page = 3

$from =10;
$to   =5;
*/

for($page =1; $page <=10; $page++)
{
	$start = $page == 1 ? 0 : $page;
    $to    =5;

    echo ($start*5)." ".$to."<br>";	

}

?>