<?php
#----------------------------------------------------------------------
# This file is part of CMS Made Simple module: Cron
# Copyright (C) 2010-2015 Jean-Christophe Cuvelier <jcc@atomseeds.com>
# Refer to licence and other details at the top of file Cron.module.php
# More info at http://dev.cmsmadesimple.org/projects/cron
#----------------------------------------------------------------------

$lang['accessdenied'] = 'Access denied. Please check your permissions.';
$lang['admindescription'] = 'This module provides a convenient way for other modules to get periodic notifications, of several kinds.';
$lang['areyousure'] = 'Are you sure ?';

$lang['error'] = 'Error!';
$lang['event_name'] = 'Event frequency';

$lang['force_cron'] = 'Send All';
$lang['force_tip'] = 'immediately send all Cron* events to registered handlers';
$lang['friendlyname'] = 'Cron';

$lang['last_sent'] = 'Last sent';

$lang['perm_review'] = 'Review status of sent Cron events';
$lang['perm_send'] = 'Manually send Cron events';
$lang['postinstall'] = 'Cron module successfully installed. After setting relevant permissions, read the module help to see what to do next.';
$lang['postuninstall'] = 'Cron module successfully uninstalled. Remember to cancel the webserver\'s notifications.';

$lang['really_uninstall'] = 'Are you sure you want to unsinstall the Cron module?';
$lang['run_cron'] = 'Send';
$lang['run_tip'] = 'send each pending Cron* event to registered handlers';

$lang['send_frequency'] = 'Sent at intervals of approximately %s';

$lang['timeparameter'] = 'This event supplies one parameter: a timestamp representing the date/time sent';

$lang['unused'] = 'Never';
$lang['upgraded'] = 'Module upgraded to version %s.';

$lang['15min'] = 'Quarter-hourly';
$lang['Hourly'] = 'Hourly';
$lang['Daily'] = 'Daily';
$lang['Weekly'] = 'Weekly';
$lang['Monthly'] = 'Monthly';
$lang['Yearly'] = 'Yearly';

$lang['period_qtrhr'] = '15 minutes';
$lang['period_hour'] = 'an hour';
$lang['period_day'] = 'a day';
$lang['period_week'] = 'a week';
$lang['period_month'] = 'a month';
$lang['period_year'] = 'a year';

$lang['event_15min_desc'] = sprintf($lang['send_frequency'],$lang['period_qtrhr']);
$lang['event_Hourly_desc'] = sprintf($lang['send_frequency'],$lang['period_hour']); 
$lang['event_Daily_desc'] = sprintf($lang['send_frequency'],$lang['period_day']);
$lang['event_Weekly_desc'] = sprintf($lang['send_frequency'],$lang['period_week']);
$lang['event_Monthly_desc'] = sprintf($lang['send_frequency'],$lang['period_month']);
$lang['event_Yearly_desc'] = sprintf($lang['send_frequency'],$lang['period_year']);

$lang['help_module'] = <<<EOS
<h3>What Does It Do?</h3>
<p>This module provides a convenient way for other modules to get periodic notifications, of several kinds.</p>
<h3>How Do I Use It?</h3>
<h4>Arrange for webserver to trigger the notifications</h4>
<p>Configure the webserver to call the relevant website URL, at 15-minute intervals<br />
e.g. for crontab on a linux server<br /><br />
<code>*/15 * * * * [/path/to/]curl [curl-options] %s</code><br /><br />
or on a Microsoft server, 'Scheduled Tasks' must be set up instead.<br /><br />
<a href="http://www.thesitewizard.com/general/set-cron-job.shtml" target="_new">This</a>
and
<a href="https://documentation.cpanel.net/display/ALD/Cron+Jobs" target="_new">this</a>
and
<a href="http://code.tutsplus.com/tutorials/managing-cron-jobs-with-php-2--net-19428" target="_new">this</a>
(among others) might be helpful for webserver configuration.</p>
<h4>Arrange for other module(s) to receive events from this module</h4>
<p>The <a href="http://docs.cmsmadesimple.org/quick-guide/using-cmsms-events" target="_new">CMSMS documentation</a> provides an overview.
In brief, include in each such module some installation code like:</p>
<code>\$this-&gt;AddEventHandler('Cron', 'eventname', false);</code><br /><br />
<p>The supported eventnames are</p>
<ul>
<li>'Cron15min'</li>
<li>'CronHourly'</li>
<li>'CronDaily'</li>
<li>'CronWeekly'</li>
<li>'CronMonthly'</li>
<li>'CronYearly'</li>
</ul>
<br />
<p>and include in the module-class some methods:</p>
<code>public function HandlesEvents()<br />
{<br />
&nbsp;return true;<br />
}<br />
<br />
public function DoEvent(\$originator, \$eventname, &amp;\$params)<br />
{<br />
&nbsp;if (\$eventname == 'CronDaily') //or other event name<br />
&nbsp;{<br />
&nbsp;&nbsp;// do stuff here<br />
&nbsp;}<br />
}</code>
<h3>Support</h3>
<p>This software is provided as-is. Please read the text of the license for the full disclaimer.</p>
<p>For help:</p>
<ul>
<li>discussion may be found in the <a href="http://forum.cmsmadesimple.org">CMS Made Simple Forums</a>; or</li>
<li>you might have some success emailing the author directly.</li>
</ul>
<p>For the latest version of the module, or to report a bug, visit the module's <a href="http://dev.cmsmadesimple.org/projects/cron">forge-page</a>.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2010-2015 Jean-Christophe Cuvelier &lt;<a href="mailto:jcc@morris-chapman.com">jcc@morris-chapman.com</a>&gt;. All rights reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#AGPL">GNU Affero General Public License</a> version 3. The module may not be used otherwise than in accordance with the terms of that license.</p>
EOS;

?>
