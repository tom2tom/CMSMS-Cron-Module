<?php
#----------------------------------------------------------------------
# This file is part of CMS Made Simple module: Cron
# Copyright (C) 2010-2015 Jean-Christophe Cuvelier <jcc@atomseeds.com>
# Refer to licence and other details at the top of file Cron.module.php
# More info at http://dev.cmsmadesimple.org/projects/cron
#----------------------------------------------------------------------

if (cron_utils::isme ())
{
/*	if (isset ($params['sendmode']))
	{
		switch ($params['sendmode'])
		{
			case :
			do stuff here
			break;
		}
	}
	else
*/
	cron_utils::sendEvents ($this);
}
exit;

?>
