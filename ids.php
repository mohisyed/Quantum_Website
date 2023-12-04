<?php
$arr[]="KT35450";
$arr[]="WA55970";
$arr[]="KD16892";
$arr[]="LJ95576";
$arr[]="BE01250";
$arr[]="kt35450";
$arr[]="wa55970";
$arr[]="kd16892";
$arr[]="lj95576";
$arr[]="be01250";

$q=$_GET["name"];

if (in_array($q,$arr))
{
	$response="taken";
}
else{
	$response = "available";
}
echo $response;
