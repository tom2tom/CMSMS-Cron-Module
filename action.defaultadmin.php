<?php
#----------------------------------------------------------------------
# This file is part of CMS Made Simple module: Cron
# Copyright (C) 2010-2015 Jean-Christophe Cuvelier <jcc@atomseeds.com>
# Refer to licence and other details at the top of file Cron.module.php
# More info at http://dev.cmsmadesimple.org/projects/cron
#----------------------------------------------------------------------

if (!cron_utils::isme()) exit;

if (!$this->VisibleToAdminUser ())
{
	cron_utils::DisplayErrorPage ($this,$this->Lang('accessdenied'));
	return;
}

$psend = $this->CheckPermission ('SendCronEvents');
if ($psend)
{
	if (isset ($params['sendnow']))
		cron_utils::sendEvents ($this, FALSE);
	elseif (isset ($params['forcenow']))
		cron_utils::sendEvents ($this, TRUE);
}

$global_periods = cron_utils::getPeriods();
$periods = array();
foreach ($global_periods as $period => $val)
{
	$obj = new StdClass();
	$obj->name = $this->Lang($period);
	$when = (int)$this->GetPreference('Last'.$period);
	$obj->last = ($when > 0) ? date('Y-m-d H:i:s', $when) : $this->Lang('unused');
	$periods[] = $obj;
}

$tplvars = array(
	'periods' => $periods,
	'title_name' => $this->Lang('event_name'),
	'title_sent' => $this->Lang('last_sent')
);

if ($psend)
{
	$conf = $this->Lang ('areyousure');
	$tplvars = $tplvars + array(
		'startform' => $this->CreateFormStart ($id, 'defaultadmin', $returnid),
		'endform' => $this->CreateFormEnd (),
		'runcron' => $this->CreateInputSubmit ($id, 'sendnow', $this->Lang ('run_cron'),
			'title = "'.$this->Lang ('run_tip').'" onclick="return confirm(\''.$conf.'\');"'),
		'forcecron' => $this->CreateInputSubmit ($id, 'forcenow', $this->Lang ('force_cron'),
			'title = "'.$this->Lang ('force_tip').'" onclick="return confirm(\''.$conf.'\');"')
	);
}

echo cron_utils::ProcessTemplate ($this, 'adminpanel.tpl', $tplvars);

?>
