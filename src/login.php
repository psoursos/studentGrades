<?php
session_start();
include('functions.php');
//include('header.php');


// check if login button is pressed
if( isset( $_POST['login'] ) ) {
  //input data validation
    
    $formUser = validateFormData( $_POST['username']);
    $formPass = validateFormData( $_POST['password']);

    //connect to database 
    include('connection.php');

    //SQL Query for username/password verification
    $query = "SELECT name, username, password  FROM Teachers WHERE username='$formUser'";
    $result = mysqli_query( $conn, $query );
    // store result
    if( mysqli_num_rows($result) > 0 ){
      while( $row =mysqli_fetch_assoc($result)){
        $user = $row['username'];
        $Hpass = $row['password'];
        $name = $row['name'];
      }
      //verify password
      //if( password_verify( $formPass, $Hpass)){
      if( $formPass == $Hpass){
        //password match
        //start session
        session_start();
        //store data in session variables
        $_SESSION['loggedInUser'] = $user;
        $_SESSION['loggedInName'] = $name;
        //redirect to teacher page
        header("Location: teacher.php");
      } else { // Password missmatch
        $loginError ="Wrong password. Try again!";

      }
    } else { //username doesnot exist
      $loginError ="No such user. Try again!";
    }
    //close mysql connection
    mysqli_close($conn); 
  }
/*
    //check for empty inputs
    if( !$_POST["firstname"] ) {
      $firstnameError = "Please enter name <br>";
    } else {
      $firstname = validateFormData( $_POST["firstname"] );
    }
    if( !$_POST["lastname"] ) {
      $lastnameError = "Please enter surname <br>";
    } else {
      $lastname = validateFormData( $_POST["lastname"] );
    }
    if( !$_POST["fathername"] ) {
      $fathernameError = "Please enter fathername <br>";
    } else {
      $fathername = validateFormData( $_POST["fathername"] );
    }
    if( !$_POST["grade"] ) {
      $gradeError = "Please enter grade <br>";
    } //elseif( ! is_float ($_POST["grade"])){
     // $gradeError = "Please enter a valid grade <br>";}
      else {
        $grade = validateFormData( $_POST["grade"] );
    }
    if( !$_POST["mobilenumber"] ) {
      $mobilenumberError = "Please enter mobile number <br>";
    }// elseif( ! is_integer ($_POST["mobilenumber"])){
     // $mobilenumberError = "Please enter a valid mobile number <br>";}
      else {
        $mobilenumber = validateFormData( $_POST["mobilenumber"] );
    }
    if( !$_POST["birthday"] ) {
      $birthdayError = "Please enter birthday <br>";
    } else {
      $birthday = validateFormData( $_POST["birthday"] );
    }
  }
  //Check if all fields are filled
  if( $firstname && $lastname && $fathername && $grade && $mobilenumber && $birthday ){
    //call query
    $query = "INSERT INTO Students(id,name,surname,fathername,grade,mobilenumber,birthday)
     VALUES(NULL,'$firstname','$lastname','$fathername','$grade','$mobilenumber','$birthday')";

     if(mysqli_query( $conn, $query)){
      echo "<div class='alert alert-success'>New record in db !</div>";
    } else {
      echo "Error for new record!". $query."<br>".mysqli_error($conn);
    }
  }
  mysqli_close($conn);
}*/
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Student Manager</title>
  </head>
  <body>
  <!--<nav id="navbar">
  <h1 class="logo">
      <span class="text-primary">Student Manager</span>
    <h1>
    <ul>
    <div class="hide">
           
           <li><a href="login.php">Log-in</a></li>
           <br>
        </ul>
    </div>
    </nav>-->
    <div class="container">
  
      

    <?php echo $loginError; ?>

      <p class="lead"><h1>Login</h1></p>
    <!--Οn Submit send form data to -->
    <!-- <form action="form_post.php" method="post">-->
      <!--  <p class="text-danger">* Required fields </p>-->
        <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SHELF"] ); ?>" method="post">
        <div class="login-form">
        <div class="login-label">Username:</div><br>
          <!--<small class="text-danger">* <?php // echo $usernameError; ?></small>-->
          <!--value="echo $formUser" ::: remembers username typed in form after unsuccessfull passw submition-->
          <input type="text" placeholder="eg.teacher1" name="username" value="<?php echo $formUser ?>"><br>
          <div class="login-label">Password:</div><br>
          <!--<small class="text-danger">* <?php //echo $passwordError; ?></small>-->
          <input type="password" placeholder="eg.teacher1" name="password" ><br><br>
          <button type="submit" class="btn-login" name="login">Login</button>
        </div>
        </form>
    </div>
    </span>
  </body>
  <?php
include('footer.php');  ?>
</html>