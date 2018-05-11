<?php 
//$connection = mysqli_connect(dbserver,dbuser,dbpass,dbname);

$connection = mysqli_connect('localhost','root','','userdb');


if (mysqli_connect_errno()) {

       die("database connection failed".mysqli_connect_error());

}
else{

	echo "connection succesful";
}
 ?> 

