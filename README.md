# php-trapmonitor
php-trapmonitor is an php trpahandler that processes snmp traps.


## setup

You need install:
- net-snmp 
- apache 
- php 
- mysql installation with default apache 
 
files stored in /var/www/html or any apache directory.

1.Set traphandler

Edit file /etc/snmp/snmptrapd.conf and add traphandler for default files to traphandler.php:

```
# listen on
agentaddress [my ip address]:162
# set php-snmptraps as default trap handler
traphandle default /usr/bin/php [yours directory]traphandler.php
```
