#!/bin/sh

homedir=/var/www/trap/bin
read host
read ip
vars=

#echo $ip >>/test.txt

while read oid val
do
  if [ "$vars" = "" ]
  then
   vars="$oid = $val"
  else
   vars="$vars, $oid = $val"
  fi
done
vars="$vars,"

ltrap="trap: $1 $host $ip $vars";

#write data to log file
#echo $ltrap >> $homedir/snmptrap.log

/usr/bin/php $homedir/parser.php "$ip" "$ltrap"

exit
