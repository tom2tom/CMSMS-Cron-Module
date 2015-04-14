<?php
#----------------------------------------------------------------------
# This file is part of CMS Made Simple module: Cron
# Copyright (C) 2010-2015 Jean-Christophe Cuvelier <jcc@atomseeds.com>
# Refer to licence and other details at the top of file Cron.module.php
# More info at http://dev.cmsmadesimple.org/projects/cron
#----------------------------------------------------------------------

// remove all preferences
$this->RemovePreference();
// and events
$periods = cron_utils::getPeriods();
foreach ($periods as $period => $time)
	$this->RemoveEvent('Cron'.$period);
// and permissions
$this->RemovePermission('ReviewCronStatus');
$this->RemovePermission('SendCronEvents');

?>
