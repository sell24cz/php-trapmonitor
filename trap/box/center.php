 
  
  <table   id="table_id" class="display">
      <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Error</th>


<?php


if (formatujPOST('show') == 'showList' ) {

    echo '
    
    <th scope="col">DateTime</th>
    <th scope="col">State</th>
    <th scope="col"></th>

    ';

}
else {
echo '  
    <th scope="col"><img style="width: 30px;" alt="calen" src="images/1.png"></th>
      <th scope="col"><img style="width: 30px;" alt="calen" src="images/7.png"></th>
      <th scope="col"><img style="width: 30px;" alt="calen" src="images/30.png"></th>
      <th scope="col">Option</th>
';
    }
?>
    </tr>
  </thead>
  <tbody>

<?php

$id='1';


$getDisabletrap = mysql_q("SELECT GROUP_CONCAT(nazwa SEPARATOR '|') AS summary FROM disable_trap ;");
$getDisabletrap = "and objname NOT RLIKE '".$getDisabletrap."'  "  ;



if (formatujPOST('show') == 'showList' ) {
    $sql = "SELECT distinct id,objname,info,time,state from 1nmp where objname ='".formatujPOST('objname')."'" ;
}
else {
    $sql = "SELECT distinct id,objname,info from 1nmp where time  > NOW() - INTERVAL 100 DAY $getDisabletrap";
}

//echo $sql;

$zapytanie = GetSQL ("$sql");
while($row = sql_fetch_array($zapytanie)) 
{

    echo '

    <tr>
    <th scope="row">'.$id.'</th>
    <td>'.$row["objname"].'</td>
    <td>'.$row["info"].'</td>
    <td>';

    if (formatujPOST('show')  == 'showCount' ) 
    {
    $connect = new count();
    echo $connect->oneDay($row["objname"],'1');
  
    }
    if (formatujPOST('show')  == NULL ) {
        echo '
        <form style="all: unset !important; " name="show" method="POST" >
        <input type="hidden" name="show" value="showCount">
        <button style="all: unset !important; " type="submit" name="submit_param" value="submit_value" class="link-button">
        <img style="width: 30px; cursor:pointer;" src="images/stat.png" data-bs-toggle="tooltip" title="show statistics">
        </button>
        </form>
        
        ';
    }
    if (formatujPOST('show') == 'showList' ) {
    
        echo $row["time"] ;
    }

    echo ' </td><td>';

    if (formatujPOST('show')  == 'showCount' ) 
    {
        echo $connect->oneDay($row["objname"],'7');
    }

    if (formatujPOST('show')  == NULL ) {
        echo '
        <form style="all: unset !important; " name="show" method="POST" >
        <input type="hidden" name="show" value="showCount">
        <button style="all: unset !important; " type="submit" name="submit_param" value="submit_value" class="link-button">
        <img style="width: 30px; cursor:pointer;" src="images/stat.png" data-bs-toggle="tooltip" title="show statistics">
        </button>
        </form>
        
        ';
    }


    if (formatujPOST('show') == 'showList' ) {
    
        echo $row["state"] ;
    }

    echo '</td><td>';

    if (formatujPOST('show')  == 'showCount' ) 
    {
        echo $connect->oneDay($row["objname"],'30');
    } 


    if (formatujPOST('show')  == NULL ) {
        echo '
        <form style="all: unset !important; " name="show" method="POST" >
        <input type="hidden" name="show" value="showCount">
        <button style="all: unset !important; " type="submit" name="submit_param" value="submit_value" class="link-button">
        <img style="width: 30px; cursor:pointer;" src="images/stat.png" data-bs-toggle="tooltip" title="show statistics">
        </button>
        </form>
        
        ';
    }

    echo '</td>';

    if (formatujPOST('show')  == NULL OR  formatujPOST('show')  == 'showCount' ) 
    {
        echo '
        <td style="background-color: '.$color.';">


        <form style="all: unset !important; " name="show" method="POST" >
        <input type="hidden" name="show" value="showList">
        <input type="hidden" name="objname" value="'.$row["objname"].'">
        <button style="all: unset !important; " type="submit" name="submit_param" value="submit_value" class="link-button">
        <img style="width: 30px; cursor:pointer;" src="images/eye.png">
        </button>

        </form>
        &nbsp;
        <form name="block" method="POST" style="all: unset !important; padding: 10px;">
        <input type="hidden" name="block" value="'.$row["id"].'">
        <input type="hidden" name="name" value="'.$row["objname"].'">
    

	    <button style="all: unset !important; " type="submit" name="submit_param" value="submit_value" class="link-button">
        <img style="width: 20px; cursor:pointer;" src="images/block.png">
	    </button>
    
        </form>
    
	</td>
        </tr>
	';
    }
    $id++;
}


?>



    </tr>
  </tbody>

  </table>

