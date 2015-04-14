<?php

if (!isset($gCms)) exit;

if (!$this->CheckPermission(''))
	return $this->DisplayErrorPage($id, $params, $returnid, $this->Lang('accessdenied'));

$global_periods = $this->getPeriods();
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
$smarty->assign('title_period', $this->Lang('period'));
$smarty->assign('title_used', $this->Lang('last_used'));

$smarty->assign('startform',$this->CreateFormStart($id,'default',$returnid));
$smarty->assign('endform',$this->CreateFormEnd());
$smarty->assign('runcron',
	$this->CreateInputSubmit($id,'run',$this->Lang('run_cron'),
	'title = "'.$this->Lang('run_tip').'" onclick="return confirm(\''.
	$this->Lang('areyousure').'\');"'));

echo $this->ProcessTemplate('adminpanel.tpl');

?>
