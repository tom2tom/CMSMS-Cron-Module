<?php
	require ('../../config.php');
	
	$cronurl = $config['root_url'] . '/cron/m1_';
	
	echo file_get_contents($cronurl);