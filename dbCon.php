<?php

	$link=mysqli_connect("SERVER URL","USERNAME","PASSWORD","TheatroDB");
	if(mysqli_connect_errno()){
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

?>
