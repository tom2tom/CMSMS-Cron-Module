<?php
#----------------------------------------------------------------------
# This file is part of CMS Made Simple module: Cron
# Copyright (C) 2010-2015 Jean-Christophe Cuvelier <jcc@atomseeds.com>
# Refer to licence and other details at the top of file Cron.module.php
# More info at http://dev.cmsmadesimple.org/projects/cron
#----------------------------------------------------------------------

global $gCms;
if (!isset ($gCms)) exit;

if (!empty($params['showtemplate']))
{
	//do what stuff ??
}

$now = time();
$periods = cron_utils::getPeriods();
foreach ($periods as $period => $time)
{
	$last = $this->GetPreference ('Last'.$period);
	if ($last <= strtotime ($time, $now))
	{
		$this->SetPreference ('Last'.$period, $now);
		$this->SendEvent ('Cron'.$period, array ($now));
	}
}

if (isset ($params['manual']))
	$this->Redirect ($id, 'defaultadmin'); 

?>
