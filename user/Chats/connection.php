<?php
		$db_servername="localhost";
		$db_username="root";
		$db_password="";
		$db_dbname="need";
		$dbconnection=mysql_connect($db_servername, $db_username, $db_password);
		if(!$dbconnection)
			echo "<p>failed</p>"; 
		else
			//echo "<p>succesful...</p>";
		$db=mysql_select_db($db_dbname);
		if(!$db)
			echo "<p>Database not selected</p>";
		else
		//	echo "<p>db selected!!!!......</p>";
?>