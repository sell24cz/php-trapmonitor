<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL & ~E_NOTICE);


include_once("inc/lib.php");
include_once("inc/class.index.php");


if( formatujPOST('block') != NULL)
{
mysql_q(" insert into disable_trap set nazwa = '".formatujPOST('name')."' ") ;

$alert = "OID name blocked: ".formatujPOST('name')." ";

}

if( formatujPOST('delete') != NULL)
{
mysql_q(" delete from disable_trap where id = '".formatujPOST('delete')."' ") ;

$alert = "OID name delete: ".formatujPOST('name')." ";

}

$show='';


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})

</script>


    <title>Trap Monitor</title>

<style>

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}

 /* unvisited link */
 a:link {
  color: black;
}

/* visited link */
a:visited {
  color: black;
}

/* mouse over link */
a:hover {
  color: black;
}

/* selected link */
a:active {
  color: black;
} 



</style>



<style>
.zoom {
  padding: 0px;
  background-color: black;
  transition: transform .2s; /* Animation */
  width: 100px;

  margin: 0 auto;
}

.zoom:hover {
  transform: scale(4.5); /* (450% zoom)*/
}
</style>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>



  </head>
  <body>
  <div class="container">


<?php
if ($alert != NULL) {

echo '
  <div style="margin-top: 10px;" class="alert alert-danger" role="alert">
  '.$alert.'
</div>
';
}
?>


  <button onclick="topFunction()" id="myBtn" title="Go to top">UP</button>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="images/logoTrap.png" width="100px"/></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">


        <li class="nav-item">
      
          <a  class="nav-link active" aria-current="page" href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal">Block Trap</a>

        </li>




      </ul>
    </div>
  </div>
</nav>



<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<?php
include("box/center.php");
?>

  </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->




  <script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}





</script>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Block Trap</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <table id="modal" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>

<?php


$i=1;

$sql = "SELECT * from disable_trap";
$zapytanie = GetSQL ("$sql");
while($r = sql_fetch_array($zapytanie)) {
echo '
  <tr>
      <th scope="row">'.$i.'</th>
      <td>'.$r['nazwa'].'</td>
      <td>
      
      </form>

<form name="delete" method="POST" style="all: unset !important; ">
<input type="hidden" name="delete" value="'.$r["id"].'">
<input type="hidden" name="name" value="'.$r["objname"].'">


<button style="all: unset !important; " type="submit" name="submit_param" value="submit_value" class="link-button">
<img style="width: 25px; cursor:pointer;" src="images/trash.png">
</button>


</form>
      
      

    </tr>
';
$i++;
}

    ?>
  </tbody>
</table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<script>

$(document).ready( function () {
    $('#table_id').DataTable();
} );


$('#example').tooltip(options)

</script>  
<hr>
</body>

</html>


