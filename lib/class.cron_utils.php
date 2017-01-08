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
		return (is_object(cmsms()));
	}

	public static function getPeriods()
	{
		return array(
		 '15min' => '-15 minutes',
		 'Hourly' => '-1 hour',
		 'Daily' => '-1 day',
		 'Weekly' => '-1 week',
		 'Monthly' => '-1 month',
		 'Yearly' => '-1 year'
		);
	}

	public static function sendEvents(&$module, $force = FALSE)
	{
		$now = time();
		$periods = self::getPeriods();
		foreach ($periods as $period => $time) {
			if ($force) {
				$send = TRUE;
			} else {
				$last = (int)$module->GetPreference('Last'.$period);
				$send = ($last <= strtotime($time, $now + 1));
			}
			if ($send) {
				$module->SetPreference('Last'.$period, $now);
				$module->SendEvent('Cron'.$period, array($now));
			}
		}
	}

	public static function ProcessTemplate(&$mod, $tplname, $tplvars, $cache=TRUE)
	{
		global $smarty;
		if ($mod->before20) {
			$smarty->assign($tplvars);
			return $mod->ProcessTemplate($tplname);
		} else {
			if ($cache) {
				$cache_id = md5('cron'.$tplname.serialize(array_keys($tplvars)));
				$lang = CmsNlsOperations::get_current_language();
				$compile_id = md5('cron'.$tplname.$lang);
				$tpl = $smarty->CreateTemplate($mod->GetFileResource($tplname), $cache_id, $compile_id, $smarty);
				if (!$tpl->isCached()) {
					$tpl->assign($tplvars);
				}
			} else {
				$tpl = $smarty->CreateTemplate($mod->GetFileResource($tplname), NULL, NULL, $smarty, $tplvars);
			}
			return $tpl->fetch();
		}
	}

	public static function DisplayErrorPage(&$mod, $message='')
	{
		$tplvars = array('title_error' => $this->Lang('error'));
		if ($message) {
			$tplvars['message'] = $message;
		}
		echo self::ProcessTemplate($mod, 'error.tpl', $tplvars);
	}
}
