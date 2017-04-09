<?php
#----------------------------------------------------------------------
# This file is part of CMS Made Simple module: Cron
# Copyright (C) 2010-2015 Jean-Christophe Cuvelier <jcc@atomseeds.com>
# Refer to licence and other details at the top of file Cron.module.php
# More info at http://dev.cmsmadesimple.org/projects/cron
#----------------------------------------------------------------------

function rmdir_recursive($dir)
{
	foreach(scandir($dir) as $file) {
		if (!($file === '.' || $file === '..')) {
			$fp = $dir.DIRECTORY_SEPARATOR.$file;
			if (is_dir($fp)) {
				rmdir_recursive($fp);
			} else {
 				@unlink($fp);
			}
		}
	}
	rmdir($dir);
}

switch ($oldversion) {
 case '0.0.5':
	$this->CreateEvent('Cron15min');
 case '0.0.8':
	$this->CreatePermission('ReviewCronStatus', $this->Lang('perm_review'));
	$this->CreatePermission('SendCronEvents', $this->Lang('perm_send'));
	$fn = cms_join_path(dirname(__FILE__), 'cronjob.php');
	if (is_file($fn)) {
		unlink($fn);
	}
 case '0.2':
 	$fn = cms_join_path(dirname(__FILE__), 'doc');
	if (is_dir($fn)) {
		rmdir_recursive($fn);
	}
}
