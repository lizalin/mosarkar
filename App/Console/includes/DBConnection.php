<?php
	/*--*******************************************************************************************************************
	' File Name             :   DBConnection.php
	' Description           :   This page is used to keep the connection details.
	' Created by            :   Sunil Kumar Parida
	' Created on            :   28-Nov-2012
	' Modification History  :
	'   <CR no.>                      <Date>             <Modified by>                <Modification Summary>'        
	'   						  
	'
	' **********************************************************************************************************************/

//======== class for  connection================
class createConnection 
{
	//=== Connection detial changed by Sudam Chandra Panda on 18/10/2013 ===
	private $myconn;
	//================ create a function for connect database=================
    function connectToDatabase() 
    {
        include('dbConfig.php');
		$conn= mysqli_connect($dbHost,$dbUser,$dbPass,$dbName,$dbPort);
		// =================testing the connection==========
        if(!$conn)
        {
            //die ("Cannot connect to the database");
            die("Connection failed: " . $conn->connect_error);
        }
        else
        {
            $this->myconn = $conn;           
        }

        return $this->myconn;

    }    
	// ================Close the connection================
    function closeConnection() 
    {
        mysqli_close($this->myconn);
    }

}

?>