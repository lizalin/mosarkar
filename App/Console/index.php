<?php
include_once('config.php');
$host			= $_SERVER['REMOTE_ADDR'];
if($host=='127.0.0.1')
{
$path 			= $_SERVER['PHP_SELF'];
$explPath		= explode('/',$path);
$projectName	        = $explPath[1];
 echo "<script>window.location.href='".SITE_PATH."'</script>";
}
else
echo "<script>window.location.href='".APP_PATH."'</script>";