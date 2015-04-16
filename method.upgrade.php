<?php
#----------------------------------------------------------------------
# This file is part of CMS Made Simple module: Cron
# Copyright (C) 2010-2015 Jean-Christophe Cuvelier <jcc@atomseeds.com>
# Refer to licence and other details at the top of file Cron.module.php
# More info at http://dev.cmsmadesimple.org/projects/cron
#----------------------------------------------------------------------

switch($oldversion)
{
	case '0.0.5':
		$this->CreateEvent ('Cron15min');
	case '0.0.8':
		foreach (array(
		 '15min' => 'qtrhr',
		 'Hourly' => 'hour',
		 'Daily' => 'day', 
		 'Weekly' => 'week', 
		 'Monthly' => 'month', 
		 'Yearly' => 'year') as $oldname => $newname)
		{
		 	$val = $this->GetPreference ($oldname);
			$this->RemovePreference ($oldname);
			$this->SetPreference ($newname, $val);
		}
		$this->CreatePermission ('ReviewCronStatus', $this->Lang ('perm_review'));
		$this->CreatePermission ('SendCronEvents', $this->Lang ('perm_send'));
		$fn = cms_join_path (dirname (__FILE__), 'cronjob.php');
		if (is_file ($fn))
			unlink ($fn);
}

?>

