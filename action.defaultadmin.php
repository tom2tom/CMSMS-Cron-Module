<?php
if (!isset($gCms)) exit;

if (! $this->CheckAccess())
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

   Code for Cron "defaultadmin" admin action
   
   -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
   
   Typically, this will display something from a template
   or do some other task.
   
*/


$global_periods = $this->getPeriods();
$periods = array();
$rowclass = 'row1';
foreach ($global_periods as $period => $time)
{
	$periods[$period]->name = $period;
	$periods[$period]->last = date('d/m/Y H:i:s', intval($this->GetPreference('Last' . $period)));
	$periods[$period]->rowclass = $rowclass;
  ($rowclass=="row1"?$rowclass="row2":$rowclass="row1");
}

$this->smarty->assign('periods', $periods);
$this->smarty->assign('period', $this->lang('period'));
$this->smarty->assign('last_execution', $this->lang('last_execution'));


echo '<div><p>' . $this->CreateLink($id, 'default', $returnid, 'Run cron', array(), $this->Lang('areyousure'),false,false,'',false,'cron/' . $id) . '</p></div>';

echo $this->ProcessTemplate('adminpanel.tpl');

