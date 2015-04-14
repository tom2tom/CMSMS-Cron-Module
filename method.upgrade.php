<?php

switch($$oldversion)
{
	case "0.0.5":
		$this->CreateEvent('Cron15min');
		break;
}

// put mention into the admin log
$this->Audit(0, $this->Lang('friendlyname'), $this->Lang('upgraded',$this->GetVersion()));

?>
