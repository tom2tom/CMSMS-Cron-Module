<?php
#----------------------------------------------------------------------
# This file is part of CMS Made Simple module: Cron
# Copyright (C) 2010-2015 Jean-Christophe Cuvelier <jcc@atomseeds.com>
# Refer to licence and other details at the top of file Cron.module.php
# More info at http://dev.cmsmadesimple.org/projects/cron
#----------------------------------------------------------------------

final class cron_utils
{
	public static function isme()
	{
		return (is_object (cmsms ()));
	}

	public static function getPeriods()
	{
		return array (
		'qtrhr' => '-15 minutes',
		'hour' => '-1 hour',
		'day' => '-1 day', 
		'week' => '-1 week', 
		'month' => '-1 month', 
		'year' => '-1 year');
	}

	public static function sendEvents(&$module)
	{
		$now = time();
		$periods = self::getPeriods();
		foreach ($periods as $period => $time)
		{
			$last = $module->GetPreference ('Last'.$period);
			if ($last <= strtotime ($time, $now + 1))
			{
				$module->SetPreference ('Last'.$period, $now);
				$module->SendEvent ('Cron'.$period, array ($now));
			}
		}
	}
}

?>
