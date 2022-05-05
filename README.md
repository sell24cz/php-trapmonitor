# php-trapmonitor
php-trapmonitor is an php trpahandler that processes snmp traps.

## screenshots

![trap](https://user-images.githubusercontent.com/83060284/166908564-fffb9dc0-eeda-4566-be47-de288ff46c34.png)


## device

- prostream
- elemental
- ups
- dasan

## setup

You need install:
- net-snmp 
- snmptrapd
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
traphandle default /usr/bin/php [yours directory]snmp-handler.sh
```

 snmp-handler.sh is in directory: 

- bin/snmp-handler.sh


2. sql

```
mysql -u root -p
Enter password:

mysql> create database snmptraps;
Query OK, 1 row affected (0.00 sec)

mysql> GRANT ALL on snmptraps.* to snmptraps@localhost identified by "snmptraps";
Query OK, 0 rows affected (0.00 sec)

mysql> exit
Bye

# import SCHEMA.SQL file
mysql -u root -p snmptraps < install/SCHEMA.sql
```
3. update password and user name 

inc/lib.php

```
   $this->databases = 'gpon';
   $this->user = 'gpon';
   $this->pass = 'pass';
```
