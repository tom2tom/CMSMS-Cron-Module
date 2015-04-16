<?php
#----------------------------------------------------------------------
# This file is part of CMS Made Simple module: Cron
# Copyright (C) 2010-2015 Jean-Christophe Cuvelier <jcc@atomseeds.com>
# Refer to licence and other details at the top of file Cron.module.php
# More info at http://dev.cmsmadesimple.org/projects/cron
#----------------------------------------------------------------------

if (!cron_utils::isme()) exit;

if (!$this->VisibleToAdminUser ())
	return $this->DisplayErrorPage($id, $params, $returnid, $this->Lang('accessdenied'));

$psend = $this->CheckPermission ('SendCronEvents');
if ($psend && isset ($params['sendnow']))
	cron_utils::sendEvents ($this);

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

$smarty->assign('periods', $periods);
$smarty->assign('title_name', $this->Lang('event_name'));
$smarty->assign('title_sent', $this->Lang('last_sent'));

if ($psend)
{
	$sf = $this->CreateFormStart ($id, 'defaultadmin', $returnid);
	$ef = $this->CreateFormEnd ();
	$btn = $this->CreateInputSubmit ($id, 'sendnow', $this->Lang ('run_cron'),
		'title = "'.$this->Lang ('run_tip').'" onclick="return confirm(\''.
		$this->Lang ('areyousure').'\');"');
}
else
{
	$sf = '';
	$ef = '';
	$btn = '';
}
$smarty->assign ('startform', $sf);
$smarty->assign ('endform', $ef);
$smarty->assign ('runcron', $btn);

echo $this->ProcessTemplate ('adminpanel.tpl');

?>
