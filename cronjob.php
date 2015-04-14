<?php
require ('../../config.php');

$cronurl = $config['root_url'] . '/modules/Cron/cron/m1_';

echo file_get_contents($cronurl);
?>
