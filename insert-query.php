<?php  include("inc/connection.php")  ?>




<?php 


$first_name = "malsha";
$last_name = "gunarathna";
$email= "s@gmail.com";
$password= "malsha";
$is_deleted = 0;







//echo "Hashed password :  {$hashed_password}";


$query = "INSERT INTO user(first_name, last_name, email, password,   is_deleted) VALUES (

	'{$first_name}',
    '{$last_name}',
	'{$email}',
	'{$password}',
	'{$is_deleted}') " ;


 $result = mysqli_query($connection,$query);

 

	
 ?>



<?php mysqli_close($connection) ;?>