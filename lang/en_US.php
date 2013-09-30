<?php
$lang['friendlyname'] = 'Cron';
$lang['postinstall'] = 'Installed';
$lang['postuninstall'] = 'Successfully uninstalled';
$lang['really_uninstall'] = 'Really? Are you sure
you want to unsinstall this fine module?';
$lang['uninstalled'] = 'Module Uninstalled.';
$lang['installed'] = 'Module version %s installed.';
$lang['upgraded'] = 'Module upgraded to version %s.';
$lang['moddescription'] = 'This module allows execution of cron jobs for modules.';

$lang['cron_executed'] = '%s cron successfully executed';
$lang['cron_launched'] = 'Cron task launched';

$lang['error'] = 'Error!';
$land['admin_title'] = 'Cron Admin Panel';
$lang['admindescription'] = 'This module allows execution of cron jobs for modules.';
$lang['accessdenied'] = 'Access Denied. Please check your permissions.';
$lang['postinstall'] = 'Post Install Message, (e.g., Be sure to set "" permissions to use this module!)';


$lang['changelog'] = '<ul>
<li>Version 0.0.1 - 14 June 2010. Initial Release.</li>
</ul>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>This module allows execution of cron jobs for modules.</p>
<h3>How Do I Use It</h3>
<h4>Make it run</h4>
<p>
To configure the Cron, just configure your server crontab to call the page "cron/run" (e.g.: curl http://www.example.com/cron/run or curl http://www.example.com/index.php?page=cron (in this case, you have to create a page called "cron" and call the module via {Cron})). A good usage would be to setup the cron to call that page every hour. (doc available at http://www.redhat.com/docs/manuals/linux/RHL-7.2-Manual/custom-guide/cron-task.html)</p>
<h4>From your modules</h4>
<p>As a developper, you can add an event handler like: $this->AddEventHandler(\'Cron\', \'CronDaily\', false); (replace CronDaily par the desired one). And then, you can add a method called DoEvent:</p>
<pre>
public function DoEvent($originator, $eventname, $params) {
	if ($eventname == \'CronDaily\') {
		// Do desired action here
	}
}
</pre>
<p>For non developpers, you can read the documentation about how to use events here: <a href="http://wiki.cmsmadesimple.org/index.php/User_Handbook/Admin_Panel/Extensions/Event_Manager" target="_new">Events documentation</a></p>
<h3>Support</h3>
<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2010, Jean-Christophe Cuvelier <a href="mailto:jcc@morris-chapman.com">&lt;jcc@morris-chapman.com&gt;</a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>';

$lang['period'] = 'Period';
$lang['last_execution'] = 'Last execution (d/m/Y)';
$lang['areyousure'] = 'Are you sure ?';

?>
