<?php 
  session_start();
  // Security:: if user not logged in ..
  if( !$_SESSION['loggedInUser'] ) {
  // .. redirect to index.php
    header("Location: index.php");
  } 
  include('header.php');
  ?>

    
    


<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <h1>Profile</h1>
    <p class="lead">Welcome <?php echo $_SESSION['loggedInUser']; ?> !</p>
   <!-- <p><button onclick="window.location.href ='logout.php'"; class="log-out-btn">Log out</button></p>-->
   <table class="fixed_header">
    <thead>
      <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Fathername</th>
        <th>Grade</th>
        <th>Mobile Number</th>
        <th>Birthday</th>
      </tr> 
    </thead>

    <?php
    //connect to db
    include('connection.php');

    $query = "SELECT * FROM Students";
    $result = mysqli_query( $conn, $query );
    if(mysqli_num_rows($result)>0){
    
      //echo "<table><tr><th>ID</th><th>name</th><th>surname</th><th>fathername</th><th>grade</th><th>mobile</th><th>birthday</th></tr>";
      echo "<tbody>";
      while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row["name"]."</td><td>".$row["surname"]."</td><td>".$row["fathername"]."</td><td>".$row["grade"]."</td><td>".$row["mobilenumber"]."</td><td>".$row["birthday"]."</td"."<br>";
        echo "</tr>";
        //
  }
    }else{
          echo "No results";
          }
          echo "</tbody>";
          echo"</table>";
  // close connection to db
  mysqli_close($conn);
  ?>
  </body>
  <?php
include('footer.php');  ?>
</html>