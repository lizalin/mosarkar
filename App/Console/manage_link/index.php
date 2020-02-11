<?php
$host			= $_SERVER['REMOTE_ADDR'];
if($host=='127.0.0.1')
{
$path 			= $_SERVER['PHP_SELF'];
$explPath		= explode('/',$path);
$projectName	= $explPath[1];
header('location:http://localhost:7001/'.$projectName);
}
else
header('location:'.$host);