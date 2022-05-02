<?php 


class count {

    public $objecName ;
    public $count ;
    public $day ;

function oneDay($objecName,$day) {
    $this->count =  mysql_q("SELECT count(*)  from 1nmp where objname = '".$objecName."' and time  > NOW() - INTERVAL ".$day." DAY ") ;
    return $this->count ;
}


}