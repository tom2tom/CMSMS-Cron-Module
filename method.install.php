<?php
		
$periods = $this->getPeriods();
foreach ($periods as $period => $time)
{
	$this->SetPreference('Last'.$period);
	$this->CreateEvent('Cron'.$period);
}

// put mention into the admin log
$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('installed',$this->GetVersion()));
		
?>
