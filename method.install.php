<?php
#----------------------------------------------------------------------
# This file is part of CMS Made Simple module: Cron
# Copyright (C) 2010-2015 Jean-Christophe Cuvelier <jcc@atomseeds.com>
# Refer to licence and other details at the top of file Cron.module.php
# More info at http://dev.cmsmadesimple.org/projects/cron
#----------------------------------------------------------------------

$periods = cron_utils::getPeriods ();
foreach ($periods as $period => $time)
{
	$this->SetPreference ('Last'.$period, 0);
	$this->CreateEvent ('Cron'.$period);
}

$this->CreatePermission ('ReviewCronStatus', $this->Lang ('perm_review'));
$this->CreatePermission ('SendCronEvents', $this->Lang ('perm_send'));

?>
