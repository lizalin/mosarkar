<?php
	
	/* ================================================
	File Name:			ConsoleConnection.php
	Author Name:		Sudam Chandra Panda
	Date Created:		26-June-2012
	Date Modified:		
	Description:		This page is used to keep the connection details.
	==================================================*/
	
	function openConn()
	{
		$DB_Name 		= "Console";
		$DB_Host		= "server13";
		$DB_User	 	= "console";
		$DB_Password		= "console";
		$con=mysqli_connect($DB_Host,$DB_User,$DB_Password,$DB_Name);
		if (!$con)
		  {
			 echo "Couldn't make a connection!"; 
			 exit;
		  }
		return $con;
	}
	
	function closeConn()
	{
				
		if ($con)
		  {
			 mysqli_close($con);			 
		  }
		return $con;
	}
?>