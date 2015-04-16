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

$lang['friendlyname'] = 'Cron';

$lang['last_sent'] = 'Last sent';

$lang['perm_review'] = 'Review status of sent Cron events';
$lang['perm_send'] = 'Manually send Cron events';
$lang['postinstall'] = 'Cron module successfully installed. After setting relevant permissions, read the module help to see what to do next.';
$lang['postuninstall'] = 'Cron module successfully uninstalled';

$lang['really_uninstall'] = 'Really? Are you sure you want to unsinstall the Cron module?';
$lang['run_cron'] = 'Send';
$lang['run_tip'] = 'send all pending Cron* events to registered handlers';

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
<p>1. If pretty URL's are enabled for the website, configure the webserver to call,
at 15-minute intervals:<br />
&nbsp;&nbsp;[YOURSITEURL]/cron/send</p>
<p>OR</p>
<p>2. If pretty URL's are NOT enabled for the website</p>
<ul>
<li>create a website template containing just<pre>{content assign='content'}</pre></li>
<li>create a non-displayed website page, give it a suitable alias,
apply the newly-created template, and make the page content just <pre>{Cron}</pre></li>
<li>Configure the webserver to call, at 15-minute intervals:<br />
&nbsp;&nbsp;[YOURSITEURL]/index.php?page=youralias<br />
where 'youralias' is the alias of the page just created</li>
</ul>
<p>For crontab on a linux server and with pretty URL's
<pre>*/15 * * * * [/path/to/]curl http://www.example.com/cron/send</pre>
or on a Microsoft server, 'Scheduled Tasks' must be set up instead of cron.<br /><br />
<a href="http://www.thesitewizard.com/general/set-cron-job.shtml" target="_new">This</a>
and
<a href="https://documentation.cpanel.net/display/ALD/Cron+Jobs" target="_new">this</a>
and
<a href="http://code.tutsplus.com/tutorials/managing-cron-jobs-with-php-2--net-19428" target="_new">this</a>
(among others) might be helpful for webserver configuration.</p>
<h4>Arrange for other module(s) to receive events from this module</h4>
<p>The <a href="http://docs.cmsmadesimple.org/quick-guide/using-cmsms-events" target="_new">CMSMS documentation</a> provides an overview.
In brief, include in each such module some installation code like:</p>
<pre>\$this-&gt;AddEventHandler('Cron', 'eventname', false);</pre>
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
<pre>public function HandlesEvents()
{
 return true;
}

public function DoEvent(\$originator, \$eventname, &amp;\$params)
{
 if (\$eventname == 'CronDaily') //or other event name
 {
  // do stuff here
 }
}</pre>
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
