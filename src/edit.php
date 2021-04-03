<?php
 
session_start();
// Security:: if user not logged in ..
if( !$_SESSION['loggedInUser'] ) {
// .. redirect to index.php
  header("Location: index.php");
} 
include('header.php');

include('connection.php');
$var_id = $_GET['id'];
$query1 = "SELECT * FROM Students WHERE id=$var_id";
$result1 = mysqli_query( $conn, $query1 );
if( mysqli_num_rows($result1)>0){

while($row = mysqli_fetch_assoc($result1)){
$firstname = $row["name"];
$lastname = $row["surname"];
$fathername= $row["fathername"] ;
$grade = $row["grade"];
$mobilenumber= $row["mobilenumber"];
$birthday= $row["birthday"];
}
}else{ // no result
  echo "<script>alert('Student was not found in database!');window.location='editstudent.php'</script>";
 // $alertMessage = "<div class='alert'>Student was not found in db.<a href='editstudent.php'>Go Back</a></div>";
}


  //Validate input data after hitting submit
  if( isset( $_POST["update_student"])){

    function validateFormData($formData){
      $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
      return $formData;
    }
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
 
  //Check if all fields are filled
  if( $firstname && $lastname && $fathername && $grade && $mobilenumber && $birthday ){
    //call update query
    $query1 = "UPDATE Students 
              SET name='$firstname',
              surname='$lastname',
              fathername='$fathername',
              grade='$grade',
              mobilenumber='$mobilenumber',
              birthday='$birthday'
              WHERE id='$var_id'";

      $result1=mysqli_query( $conn, $query1);
     

     if($result1){
      echo "<script>alert('Student Updated Succesfully!');window.location='editstudent.php'</script>";
     // $alertMessage = "<div class='alert'>Student Updated Succesfully.<a href='editstudent.php'>Ok</a></div>";
    } else {
      echo "<script>alert('Error updating record!!');window.location='editstudent.php'</script>".mysqli_error($conn);
      //echo "Error updating record!".mysqli_error($conn);
    }
  }
  }
  mysqli_close($conn);
?>



<?php
if( isset( $_POST["form_submit"] ) ) {
  echo "<h4>Your info </h4>"."<br>";
  echo "$firstname <br> ";
  echo "$lastname <br> ";
  echo "$fathername <br> ";
  echo "$grade <br> ";
  echo "$mobilenumber <br> ";
  echo "$birthday <br> ";
}



/* insert into database*/

//$query = "INSERT INTO Students(id,name,surname,fathername,grade,mobilenumber,birthday)
//VALUES(NULL,'petros','soursos','thanos','6.5','6984099924','1990-2-3')";

//if(mysqli_query( $conn, $query)){
 // echo "New record!";
//} else {
//  echo "Error for new record!". $query."<br>".mysqli_error($conn);
//}
?>
<!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="css/style.css">
     <title>Student Manager</title>
   </head>
   <body>
     <!--Οn Submit send form data to -->
     <!-- <form action="form_post.php" method="post">-->
     <div class="wrapper">
               <div class="content"><h1>Edit Student</h1></div>
        
        <form class="form-add" action="<?php echo htmlspecialchars( $_SERVER["PHP_SHELF"] ); ?>" method="post">
        
           <div class="top-form">
              <div class="inner-form">
                 <div class="add-label">First name:</div>
                 <small class="text-danger">* <?php echo $firstnameError; ?></small>
                 <input type="text" placeholder="eg.Sam" name="firstname" value="<?php echo $firstname ?>">
               </div>
               <div class="inner-form">
                 <div class="add-label">Last name:</div>
                  <small class="text-danger">* <?php echo $lastnameError; ?></small>
                  <input type="text" placeholder="eg.Bridges" name="lastname" value="<?php echo $lastname ?>">
                </div>
           </div>
          <div class="middle-form">
               <div class="inner-form">
                    <div class="add-label">Father name:</div>
                       <small class="text-danger">* <?php echo $fathernameError; ?></small>
                      <input type="text" placeholder="eg.Porter"name="fathername" value="<?php echo $fathername ?>">
                </div>
                <div class="inner-form">
                    <div class="add-label"> Grade:</div>
                    <small class="text-danger">* <?php echo $gradeError; ?></small>
                    <input type="number" step="0.1" min="0" max="10" placeholder="eg.7.6"name="grade" value="<?php echo $grade ?>">
                </div>  
          </div>
          <div class="bottom-form">
                <div class="inner-form">
                   <div class="add-label">Mobile number:</div>
                   <small class="text-danger">* <?php echo $mobilenumberError; ?></small>
                   <input type="tel" placeholder="eg.6931254864"name="mobilenumber" value="<?php echo $mobilenumber ?>">
                </div>
                <div class="inner-form">
                    <div class="add-label">Birthday:</div>
                    <small class="text-danger">* <?php echo $birthdayError; ?></small>
                    <input type="date" placeholder="eg.1993-4-1"name="birthday" value="<?php echo $birthday ?>">
                </div>
          </div>
          
          
          
        
        <input type="submit" name="update_student" value="Update Student">
        <a href="editstudent.php" class="cancel-button">Cancel</a>
        
       
        <p class="text-danger">* Required fields </p>
        </div>
        </form> 

   </body>

  <footer>
  <?php include('footer.php');  ?>
</footer>
</html>