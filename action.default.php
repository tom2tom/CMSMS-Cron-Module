<?php

if (!cmsms()) exit;

$now = time();
$periods = $this->getPeriods();
foreach ($periods as $period => $time)
{
	$last = $this->GetPreference('Last'.$period);
	if ($last <= strtotime($time, $now))
	{
		$this->SetPreference('Last'.$period, $now);
		$this->SendEvent('Cron'.$period,array());
	}
}

?>
