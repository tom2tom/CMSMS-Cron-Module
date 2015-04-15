<?php
#-------------------------------------------------------------------------
# CMS Made Simple module: Cron (C) 2010-2015 Jean-Christophe Cuvelier
# Allows other modules to get periodic notifications
#-------------------------------------------------------------------------
# CMS Made Simple (C) 2004-2015 Ted Kulp (wishy@cmsmadesimple.org)
# Its homepage is: http://www.cmsmadesimple.org
#-------------------------------------------------------------------------
# This module is free software; you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as published
# by the Free Software Foundation; either version 3 of the License, or
# (at your option) any later version.
#
# This module is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU Affero General Public License for more details.
# Read it online at http://www.gnu.org/licenses/licenses.html#AGPL
#-------------------------------------------------------------------------

class Cron extends CMSModule
{
	function GetAdminDescription()	{ return $this->Lang ('admindescription'); }
	function GetAdminSection()		{ return 'siteadmin'; }
	function GetAuthor()			{ return 'Jean-Christophe Cuvelier'; }
	function GetAuthorEmail()		{ return 'jcc@atomseeds.com'; }
	function GetDependencies()		{ return array (); }
	function GetFriendlyName()		{ return $this->Lang ('friendlyname'); }
	function GetHelp()				{ return $this->Lang ('help_module'); }
	function GetName()				{ return 'Cron'; }
	function GetVersion()			{ return '0.1'; }
	function HasAdmin()				{ return true; }
	function InstallPostMessage()	{ return $this->Lang ('postinstall'); }
	function IsPluginModule()		{ return true; }
	function MinimumCMSVersion()	{ return '1.8'; }
	function UninstallPostMessage()	{ return $this->Lang ('postuninstall'); }
	function UninstallPreMessage()	{ return $this->Lang ('really_uninstall'); }
	//for 1.11+
	function AllowSmartyCaching()	{ return true; }
	function LazyLoadAdmin()		{ return false; }
	function LazyLoadFrontend() 	{ return true; }

	function GetChangeLog()
	{
		return ''.@file_get_contents(cms_join_path(dirname(__FILE__),'changelog.inc'));
	}

	function DisplayErrorPage($id, &$params, $return_id, $message='')
	{
		$smarty->assign ('title_error', $this->Lang('error'));
		$smarty->assign ('message', $message);
		echo $this->ProcessTemplate ('error.tpl');
	}

	function VisibleToAdminUser()
	{
		return
		 $this->CheckPermission ('ReviewCronStatus') ||
		 $this->CheckPermission ('SendCronEvents');
	}

	function SetParameters()
	{
		$this->InitializeAdmin ();
		$this->InitializeFrontend (); 
	}

	function InitializeAdmin()
	{
	}

	function InitializeFrontend()
	{
		$this->RegisterModulePlugin ();
		$this->RestrictUnknownParams ();
		$this->SetParameterType ('sendmode', CLEAN_STRING); //internal use only

		$returnid = cmsms()->GetContentOperations()->GetDefaultPageID(); //anything will do ?
		$this->RegisterRoute ('/cron\/send$/',
			array ('action' => 'send',
			'showtemplate' => 'false', //not FALSE, or any of its alternates!
			'returnid' => $returnid));
		$this->RegisterRoute ('/cron\/send\/(?P<sendmode>[\w-]{2,10})$/',
			array ('action' => 'send',
			'showtemplate' => 'false',
			'returnid' => $returnid));
	}

	function DoAction ($action, $id, $params, $returnid = '')
	{
		switch ($action)
		{
		 case 'defaultadmin':
			parent::DoAction ($action, $id, $params, $returnid);
			return;
		 case 'default':
		 case 'send':
	 		if (cron_utils::isme ())
			{
				if (isset ($params['sendmode']))
				{
					switch ($params['sendmode'])
					{
/*						case :
						do stuff here
						break;
*/
					}
				}
				else
					cron_utils::sendEvents ($this);
			}
		 default:
			exit;
		}
	}

	function GetEventDescription($eventname)
	{
		if(strncmp ($eventname,'Cron',4) === 0)
		{
			$key = 'event_'.substr ($eventname,4).'_desc';
			return $this->Lang ($key);
		}
		return '';
	}

	function GetEventHelp($eventname) 
	{
		if(strncmp ($eventname,'Cron',4) === 0)
			return $this->Lang ('timeparameter');
		return '';
	}

}

?>
