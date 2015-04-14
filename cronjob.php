<?php
// CHECKME what is this for ?
if (!cron_utils::isme()) exit;
$config = cmsms()->GetConfig();
$fn = cms_join_path ($config['root_path'],'modules','Cron','cron','m1_');
if (is_file ($fn))
	echo file_get_contents ($fn);
?>
