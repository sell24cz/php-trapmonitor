<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0); 
error_reporting(E_ALL & ~E_NOTICE);
ini_set('error_log','/dev/null'); #linux

include("/var/www/trap/inc/lib.php");

function get($a,$b,$c) 
{
    if(preg_match_all('/'.$a.'(.*?).'.$b.'/ims', $c, $trap));

//we cut out the characters
    $replace = array('"',',');
    $trap = str_replace($replace, "", $trap[0][0]);
    $explode = explode('=',$trap);

    return $explode[1] ;
}

function implode_table($danee) 
{
    if(preg_match_all('/\[(.*?)\]/ims', $danee, $a));
    $sg = implode($a[1],' ') ;
    return  $sg ;    
}


//we download trap data for formatting
$dane = trim($argv[2]) ;

// example data from dasan OLT
//$dane = 'trap: default host-n4-95-227.telpol.net.pl UDP: [83.242.95.227]:40457->[46.148.0.132]:162 DISMAN-EVENT-MIB::sysUpTimeInstance = 67:23:05:44.98, SNMPv2-MIB::snmpTrapOID.0 = DASAN-SMI::dasanEvents.395, SLE-GPON-MIB::sleGponOltId.0 = 4000007, SLE-GPON-MIB::sleGponOnuId.0 = 45,';



// extract ip
$ip = trim($argv[1]);
$aip  = explode(':',$ip);
$ip = str_replace(']','',str_replace('[','',trim($aip[1])));

$logfile = "/var/www/trap/bin/parser.log";
$log = 0;

//write log 
if( $log > 0 )
{
    $plik = fopen($logfile, "a");
    if( $plik )
    {
	fwrite($plik,$dane."\n");
	fclose($plik);
    }
}

$time =  date("H") ;
$rok = date("Y");  
$timestamp = time(); ;

$alarmid = 0; 
$objname = '' ;
$info = ''; 
$address = $ip;
$severity = '' ;
$state = '';
$data = date("Y/m/d H:i:s");

//filtration depending on the device
if (strpos($dane,'APPEARTV-MESSAGES-MIB') !== false) 
{
    $alarmid = 0; 
    $objname = "APPEAR ".trim(get('SNMP-COMMUNITY-MIB::snmpTrapCommunity.0',',',$dane)) ;
    $info = trim(get('APPEARTV-MESSAGES-MIB::msgText.21908','APPEARTV-MESSAGES-MIB::msgSourceName.21908',$dane)); 
    $severity = trim(get('APPEARTV-MESSAGES-MIB::msgSeverity.21908',',',$dane)); ;
    $state = trim(get('APPEARTV-MESSAGES-MIB::msgSeverity.21908',',',$dane));
    $data = trim(get('APPEARTV-MESSAGES-MIB::msgGenerationTime.21908',',',$dane)); 
}


if (strpos($dane,'DIVICOM-AFA-MIB') !== false) 
{
    $alarmid = 0; 
    $objname = "DVBC ".trim(get('DIVICOM-AFA-MIB::afaObjectName','SNMPv2-SMI::enterprises.11.2.17.2.2.0',$dane)) ;
    $info = trim(get('DIVICOM-AFA-MIB::afaInfoString','DIVICOM-AFA-MIB::afaAssertTime',$dane)) ; 
    $address = trim(get('SNMPv2-SMI::enterprises.11.2.17.2.2.0',',',$dane));
    $severity = '' ;
    $state = trim(get('DIVICOM-AFA-MIB::afaSeverity',',',$dane));
    $data = trim(get('DIVICOM-AFA-MIB::afaAssertTime',',',$dane)); 
}

 if (strpos($dane,'UPS-MIB::upsAlarmDescr') !== false) 
 {
    $alarmid = 0;
     $info = "UPS Hankego".trim(get('DISMAN-EVENT-MIB::sysUpTimeInstance','SNMPv2-MIB::snmpTrapOID.0',$dane)) ;
     $objname = trim(get('UPS-MIB::upsAlarmDescr.','SNMPv2-MIB::snmpTrapEnterprise.0',$dane)) ;
     $address = trim(get('SNMPv2-SMI::enterprises.11.2.17.2.2.0',',',$dane));
     $severity = '' ;
     $state = trim(get('DIVICOM-AFA-MIB::afaSeverity',',',$dane));
     $data = trim(get('DIVICOM-AFA-MIB::afaAssertTime',',',$dane));
 }

if ( strpos($dane,'HarmonicTrapEventElement-MIB') !== false ) 
{
    $alarmid = 0; 
    $objname = "OTT ".trim(implode_table(get('HarmonicTrapEventElement-MIB::transientTrapVariable.27.2.0',',',$dane))) ;
    $info = trim(implode_table(get('HarmonicTrapEventElement-MIB::transientTrapVariable.27.1.0','HarmonicTrapEventElement-MIB::severity.0',$dane))) ; 
    $address = trim(get('SNMP-COMMUNITY-MIB::snmpTrapAddress.0',',',$dane));
    $severity = '' ;
    $state = trim(get('HarmonicTrapEventElement-MIB::state.0',',',$dane));
    $data = trim(get('DISMAN-EVENT-MIB::sysUpTimeInstance',',',$dane)); 
}

if ( strpos($dane,'HARMONIC-PROSTREAM-MIB') !== false ) 
{
    $alarmid = 0; 
    $objname = "OTT ".trim(implode_table(get('HarmonicTrapEventElement-MIB::transientTrapVariable.27.2.0',',',$dane))) ;
    $info = trim(get('HVN-GLOBAL-REG::harmonicInc.3.3.0',',',$dane)); 
    $address = trim(get('SNMP-COMMUNITY-MIB::snmpTrapAddress.0',',',$dane));
    $severity = '' ;
    $state = trim(get('HarmonicTrapEventElement-MIB::state.0',',',$dane));
    $data = trim(get('DISMAN-EVENT-MIB::sysUpTimeInstance',',',$dane)); 
}


if (strpos($dane,'ELEMENTAL-MIB') !== false )
{
 $alarmid = 0;
 $info = trim(get('ELEMENTAL-MIB::alertMessage',',',$dane));
 $objname = trim(get('ELEMENTAL-MIB::alertNodeHostname',',',$dane)).' '. trim(get('ELEMENTAL-MIB::alertRunnableName',',',$dane));
 $severity = trim(get('ELEMENTAL-MIB::alertSeverity',',',$dane));
 $state = trim(get('ELEMENTAL-MIB::alertSeverity',',',$dane));
 }


if (strpos($dane,'DASAN-SMI') !== false )
{
    $alarmid = 0;
    $objname = "DASAN ". trim(get('SNMPv2-MIB::snmpTrapOID.0',',',$dane));
    $severity = '';

    if( strpos($dane,'DASAN-SMI::dasanEvents.36,') !== false || strpos($dane,'DASAN-SMI::dasanEvents.37,') !== false)
    {
	$info = trim(get('DASAN-DHCP-MIB::dasanSwitchMIBObjects.2.14.1.1.1.2.0',',',$dane)).' '.trim(get('DASAN-DHCP-MIB::dasanSwitchMIBObjects.2.14.1.1.1.2.0',',',$dane)) ;
    }
    elseif ( strpos($dane,'DASAN-SMI::dasanEvents.39,') !== false || strpos($dane,'DASAN-SMI::dasanEvents.41,') !== false  || strpos($dane,'DASAN-SMI::dasanEvents.42,') !== false)
    {
        $info = trim(get('SNMPv2-MIB::sysDescr.0',',',$dane)).' '.trim(get('SLE-DEVICE-MIB::sleSlotSystemIndex.0',',',$dane)) .' ' . trim(get('SLE-DEVICE-MIB::sleSlotSystemInfoEntry.31.0',',',$dane));
    }
    elseif ( strpos($dane,'DASAN-SMI::dasanEvents.200') !== false || strpos($dane,'DASAN-SMI::dasanEvents.201') !== false)
    {
	$address = trim(get('SLE-SNMP-MIB::sleAgentAddress.0', ',', $dane));
        $info = trim(get('SNMPv2-MIB::sysDescr.0',',',$dane)).' '.trim(get('SLE-GPON-MIB::sleGponOltId.0 ',',',$dane)) .' ' . trim(get('SLE-GPON-MIB::sleGponOnuId.0',',',$dane)) . ' ' . trim(get('SLE-GPON-MIB::sleGponOnuSerial.0',',',$dane));
    }
    elseif ( strpos($dane,'DASAN-SMI::dasanEvents.217') !== false )
    {
	$info = trim(get('SLE-GPON-MIB::sleGponOltId.0 ',',',$dane)) .' ' . trim(get('SLE-GPON-MIB::sleGponOnuId.0',',',$dane)) . ' ' . trim(get('SLE-GPON-MIB::sleGponOnuSerial.0',',',$dane));
	$info .= ' ' . trim(get('SLE-GPON-MIB::sleGponOnuPortSlotId.0',',',$dane)).  ' '.trim(get('SLE-GPON-MIB::sleGponOnuPortId.0',',',$dane)). ' '. trim(get('SLE-GPON-MIB::sleGponOnuPortOperStatus.0',',',$dane));
    }
    elseif ( strpos($dane,'DASAN-SMI::dasanEvents.223') !== false || strpos($dane,'DASAN-SMI::dasanEvents.224') !== false)
    {
	$info = trim(get('SLE-GPON-MIB::sleGponOltId.0 ',',',$dane)) .' ' . trim(get('SLE-GPON-MIB::sleGponOnuId.0',',',$dane)) . ' ' . trim(get('SLE-GPON-MIB::sleGponOnuSerial.0',',',$dane));
    }
    else
    {
    	$info = trim(get('SLE-GPON-MIB::sleGponOltId.0',',',$dane)) .' ' . trim(get('SLE-GPON-MIB::sleGponOnuId.0',',',$dane));
    }
}

if( $data == "" || $data == '0000-00-00 00:00:00')
{
    $data = "$rok $godzina" ;
}

if( $log > 0 )
{
    $plik = fopen($logfile, "a");
    if( $plik )
    {
	fwrite($plik,$objname."\n");
	fclose($plik);
    }
}


// Insert to database only full objname
if( $objname != "" )
{

    $q = "INSERT INTO 1nmp ( alarmid, objname, info, address, severity, state, time, timestamp, alarmed1, alarmed2, alarmed_one, alarmed_all, alarmed ) VALUES('$alarmid','$objname','$info','$address','$severity','$state','$data','$timestamp','$rok','$time','$rok','0','0')";
    if( $log > 0 )
    {
	$plik = fopen($logfile, "a");
	if( $plik )
	{
	    fwrite($plik,$q."\n");
    	    fclose($plik);
	}
    }
    GetSQL($q);
}
else
{
    if( $log > 0 )
    {
	$plik = fopen($logfile, "a");
	if( $plik )
	{
	    fwrite($plik,$dane."\n");
    	    fclose($plik);
	}
    }
}


