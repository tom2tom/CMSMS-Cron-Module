# Setup to receive periodic notices from the webserver
## URL to call
Configure the webserver to call, at 15-minute intervals:
 [YOURSITEURL]/index.php?mact=Cron,cntnt01,default,0
## Linux setup
Crontab settings e.g.

```*/15 * * * * [/path/to/]curl [YOURSITEURL]/index.php?mact=Cron,cntnt01,default,0```

OR

```1,16,31,46 * * * * [/path/to/]curl [YOURSITEURL]/index.php?mact=Cron,cntnt01,default,0```
## Windows setup
Put a .vbs file like the snippet below somewhere on the server.
```
On Error Resume Next
Dim objRequest
Dim URL
Set objRequest = CreateObject("Microsoft.XMLHTTP")
URL = "[YOURSITEURL]/index.php?mact=Cron,cntnt01,default,0"
objRequest.open "GET",URL,false 
objRequest.Send
Set objRequest = Nothing
```
Arrange for Task Scheduler to run the script.

[Here](http://www.peterviola.com/windows-server-scheduled-task-for-opening-web-site-url) is some guidance.
