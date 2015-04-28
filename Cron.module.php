<?php
#-------------------------------------------------------------------------
# CMS Made Simple module: Cron (C) 2010-2015 Jean-Christophe Cuvelier
# Allows other modules to get periodic notifications
#-------------------------------------------------------------------------
# CMS Made Simple (C) 2004-2015 Ted Kulp (wishy@cmsmadesimple.org)
# Its homepage is: http://www.cmsmadesimple.org
#-------------------------------------------------------------------------
# This module is free software; you can redistribute it and/or modify it
# under the terms of the GNU Affero General Public License as published
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
	function __construct()
	{
		parent::__construct();
		global $CMS_VERSION;
		if(version_compare ($CMS_VERSION, '1.10') < 0)
		{
			//class autoloading not supported
			$fn = cms_join_path (dirname(__FILE__), 'lib', 'class.cron_utils.php');
			require_once $fn;
		}
	}

	function GetAdminDescription()	{ return $this->Lang ('admindescription'); }
	function GetAdminSection()		{ return 'siteadmin'; }
	function GetAuthor()			{ return 'Jean-Christophe Cuvelier'; }
	function GetAuthorEmail()		{ return 'jcc@atomseeds.com'; }
	function GetDependencies()		{ return array (); }
	function GetFriendlyName()		{ return $this->Lang ('friendlyname'); }
	function GetName()				{ return 'Cron'; }
	function GetVersion()			{ return '0.1'; }
	function HasAdmin()				{ return true; }
	function InstallPostMessage()	{ return $this->Lang ('postinstall'); }
	function IsPluginModule()		{ return true; }
	function MaximumCMSVersion()	{ return '1.19.99'; } //i.e. not (yet) 2+
	function MinimumCMSVersion()	{ return '1.8'; }
	function UninstallPostMessage()	{ return $this->Lang ('postuninstall'); }
	function UninstallPreMessage()	{ return $this->Lang ('really_uninstall'); }
	//for 1.11+
	function AllowSmartyCaching()	{ return true; }
	function LazyLoadAdmin()		{ return false; }
	function LazyLoadFrontend() 	{ return false; }

	function GetChangeLog()
	{
		return ''.@file_get_contents(cms_join_path(dirname(__FILE__), 'changelog.inc'));
	}

	function GetHelp()
	{
		$returnid = cmsms()->GetContentOperations()->GetDefaultContent();
		//cmsms 1.10+ also has ->create_url();
		$url = $this->CreateLink('m1_', 'default', $returnid, '', array(), '', TRUE, FALSE, '', FALSE, 'Cron/send');
		return $this->Lang ('help_module', $url);
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
		//this is needed to block construct-time circularity
	}

	function InitializeFrontend()
	{
		$this->RegisterModulePlugin ();
		$this->RestrictUnknownParams ();
		$this->SetParameterType ('sendmode', CLEAN_STRING); //internal use only

		$returnid = cmsms()->GetContentOperations()->GetDefaultPageID(); //anything will do ?
		$this->RegisterRoute ('/[Cc]ron\/send$/',
			array ('action' => 'default',
			'showtemplate' => 'false', //not FALSE, or any of its equivalents !
			'returnid' => $returnid));
		$this->RegisterRoute ('/[Cc]ron\/send\/(?P<sendmode>[\w\-]{2,10})$/',
			array ('action' => 'default',
			'showtemplate' => 'false',
			'returnid' => $returnid));
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
