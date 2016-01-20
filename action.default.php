<?php
#----------------------------------------------------------------------
# This file is part of CMS Made Simple module: Cron
# Copyright (C) 2010-2015 Jean-Christophe Cuvelier <jcc@atomseeds.com>
# Refer to licence and other details at the top of file Cron.module.php
# More info at http://dev.cmsmadesimple.org/projects/cron
#----------------------------------------------------------------------
if (cron_utils::isme () && 1) //TODO suitable protection against invaders
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

//clear all page content echoed before now
$handlers = ob_list_handlers();
if($handlers)
{
	$l = count($handlers);
	for ($c = 0; $c < $l; $c++)
		ob_end_clean();
}

exit;
?>
