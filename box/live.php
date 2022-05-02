<?php


include('../inc/lib.php');
$polacz = new BAZA ;

$godzina = date('H:i');
//$godzina = date('H', strtotime(''.$godzina.' -60 minutes')); 
//$godzina=$godzina-1;
$time = date('Y-m-d');
$time = "$time $godzina" ;

$result_sqll = mysql_query("select * from 2nmp where info like  '%Failure%' and time like '$time%'  ") or die(''.mysql_error());

        while($rrl=mysql_fetch_array($result_sqll)) {
          $nazwaa = $rrl['objname'];
          $infoa = $rrl['info']; 
          $statea = $rrl['state'];
echo "<font color=\"green\">$nazwaa </font> $infoa  <font color=\"green\"> $statea </font> <br />"  ;

        }




$result_sql = mysql_query(" select * from 2nmp order  by id desc limit 1   ") or die(''.mysql_error());

        while($rr=mysql_fetch_array($result_sql)) {
          $nazwa = $rr['objname'];
          $info = $rr['info']; 
          $state = $rr['state'];
        }

echo "<font color=\"red\">$nazwa </font> $info  <font color=\"red\"> $state </font> "  ;
?>