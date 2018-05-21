<?php session_start(); ?>


<?php require_once('inc/connection.php') ?>




 <?php 


       
    if(isset($_POST['submit'])){

      $error =array ();

      if (!isset($_POST['email'])|| strlen(trim($_POST['email']))<1 ) {
        $error[] ="User name is missing /invalid";
      }
    
    if (!isset($_POST['password'])|| strlen(trim($_POST['password']))<1 ) {
        $error[] ="Password is missing /invalid";
      }


if (empty($error)) {
  
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);

        $hashed_password = sha1($password);

        $query = " SELECT * from user where email='".$email."' and password='".$hashed_password."'";

        $result= mysqli_query($connection, $query);
       
       if($result){

       if(mysqli_num_rows($result)==1){

$user= mysqli_fetch_assoc($result);

$_SESSION['user_id'] = $user['id'];

$_SESSION['name'] = $user['first_name'];


          header('location:users.php');

            $message = $Results['name']." Login Sucessfully!!";
             }
        else
        {
            $error[]= "Invalid email or password!!";
            
        }        

       }
        
       }


    }

?>




<!DOCTYPE html>
<html>
<head>
	<title>Log-In-User Management System</title>
<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
<div class="login">
	
<form action="login.php" method="post">
	
<fieldset>
	
<legend><h1>Log In</h1></legend>

  <?php 

if (isset($error)&& !empty($error)) {
 
  echo '<p class="error">Invalid User/Password</p>';

}

     ?>
          <?php 

if (isset($_GET['logout'])) {
  # code...

 echo '<p id="info">Succesfully Logout</p>';

}

      ?>


	
	<label for="">Usename:</label>
	<input type="text" name="email"  placeholder="Email Addresss">
</p>

<p>
	<label for=""> Password</label>
	<input type="password" name="password"  placeholder="password">

</p>

<p>   
<button type="submit" name="submit">Log In </button>

</p>


</fieldset>

</form>

</div>

</body>
</html>

<?php 

mysqli_close($connection);
 ?>