# Setup to receive periodic notices from the webserver

## URL to call

Configure the webserver to call, at 15-minute intervals:
 [YOURSITEURL]/index.php?mact=Cron,cntnt01,default,0

## Linux Setup

Crontab settings for a linux server e.g.
```*/15 * * * * [/path/to/]curl [YOURSITEURL]/index.php?mact=Cron,cntnt01,default,0 1>/dev/null 2>&1```
OR
```1,16,31,46 * * * * [/path/to/]curl [YOURSITEURL]/index.php?mact=Cron,cntnt01,default,0 1>/dev/null 2>&1```

## Windows Setup

Arrange for Task Scheduler to run a script.

[Here](http://www.peterviola.com/windows-server-scheduled-task-for-opening-web-site-url) is some guidance.
