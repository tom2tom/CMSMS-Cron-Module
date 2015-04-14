<?php
#-------------------------------------------------------------------------
# Module: Cron - allows modules to get cron notifications
# Version: 0.1 Jean-Christophe Cuvelier
#-------------------------------------------------------------------------
# CMS Made Simple (C) 2004-2015 Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#-------------------------------------------------------------------------
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as published
# by the Free Software Foundation; either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU Affero General Public License for more details.
# Read it online: http://www.gnu.org/licenses/licenses.html#AGPL
#-------------------------------------------------------------------------

class Cron extends CMSModule
{
	function GetName()					{	return 'Cron';							}
	function GetFriendlyName()			{	return $this->Lang('friendlyname');		}
	function GetVersion()				{	return '0.1';							}
	function GetHelp()					{	return $this->Lang('help_module');		}
	function GetAuthor()				{	return 'Jean-Christophe Cuvelier';		}
	function GetAuthorEmail()			{	return 'jcc@atomseeds.com';				}
	function IsPluginModule()			{	return true;							}
	function HasAdmin()					{	return true;							}
	function GetAdminSection()			{	return 'siteadmin';						}	
	function GetAdminDescription()		{	return $this->Lang('admindescription');	}
	function VisibleToAdminUser()		{	return true;							}

	function GetChangeLog()
	{
		return ''.@file_get_contents(cms_join_path(dirname(__FILE__),'changelog.inc'));
	}

	function DisplayErrorPage($id, &$params, $return_id, $message='')
	{
		$smarty->assign('title_error', $this->Lang('error'));
		$smarty->assign('message', $message);
		echo $this->ProcessTemplate('error.tpl');
	}

	function GetDependencies()
	{
		return array();
	}

	function MinimumCMSVersion()
	{
		return "1.8";
	}

	function InstallPostMessage()
	{
		return $this->Lang('postinstall');
	}

	function UninstallPostMessage()
	{
		return $this->Lang('postuninstall');
	}

	function UninstallPreMessage()
	{
		return $this->Lang('really_uninstall');
	}

	//for 1.11+
	function AllowSmartyCaching()
	{
		return true;
	}

	function LazyLoadAdmin()
	{
		return false;
	}

	function LazyLoadFrontend()
	{
		return false;
	}

	function SetParameters()
	{
		$this->InitializeAdmin();
		$this->InitializeFrontend(); 
	}

	function InitializeAdmin()
	{
		$this->CreateParameter('showtemplate',0,$this->Lang('help_showtemplate'));
	}

	function InitializeFrontend()
	{
		$this->RegisterModulePlugin();
		$this->RestrictUnknownParams();
		$this->SetParameterType('showtemplate',CLEAN_INT);
		$this->RegisterRoute('/cron\/(?P<maction>[a-zA-Z0-9_-]+)(\/.*?)?$/',
		array(
		 'action' => 'default', 
		 'showtemplate' => 0,
		 'returnid' => cmsms()->GetContentOperations()->GetDefaultPageID()
		));
	}

	public function GetEventDescription($eventname)
	{
		if(strncmp($eventname,'Cron',4) === 0)
		{
			$key = 'event_'.substr($eventname,4).'_desc';
			return $this->Lang($key);
		}
	}

	public function GetEventHelp($eventname) 
	{
		if(strncmp($eventname,'Cron',4) === 0)
		{
//			$key = 'event_'.substr($eventname,4).'_help';
//			return $this->Lang($key);
			return $this->Lang('noparameters');
		}
	}

	function getPeriods()
	{
		return array(
		 '15min' => '-15 minutes',
		 'Hourly' => '-1 hour',
		 'Daily' => '-1 day', 
		 'Weekly' => '-1 week', 
		 'Monthly' => '-1 month', 
		 'Yearly' => '-1 year'
		);
	}
}

?>
