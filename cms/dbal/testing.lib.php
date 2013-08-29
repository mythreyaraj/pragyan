<?php 
	require_once('tableclass.lib.php');
	$table=new Table('test');
	$ar=[
		[5,6]
	];
	$table->insert($ar);
?>