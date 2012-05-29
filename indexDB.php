<?php

	require 'testDB.php';
	
	$db_test = new db_sqlite();
	
	print_r($db_test);
	if (!$db_test->dbhandle) {
		echo "<br>database open error";
		exit;
	}
	
	$table_test = new table_test($db_test->dbhandle);
	
	echo $table_test->insert_record(1, 'namaedesu', 0)? "OK =()o<)": "×";
	
	echo "END";
	
?>