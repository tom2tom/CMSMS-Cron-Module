<?php

// remove all preferences
$this->RemovePreference();

$periods = $this->getPeriods();
foreach ($periods as $period => $time)
	$this->RemoveEvent('Cron'.$period);

// put mention into the admin log
$this->Audit(0, $this->Lang('friendlyname'), $this->Lang('uninstalled'));

?>
