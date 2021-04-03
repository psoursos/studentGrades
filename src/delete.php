<?php 
  session_start();
  // Security:: if user not logged in ..
  if( !$_SESSION['loggedInUser'] ) {
  // .. redirect to index.php
    header("Location: index.php");
  } 

  
  include('functions.php');
  //include('header.php');
  
  
        //connect to db
        include('connection.php');
       // if(isset($_POST['submit-search'])){
        $var_id = $_GET['id'];
        //echo "ID=".$var_id;
        $query = "DELETE FROM Students WHERE id=$var_id";
        $result = mysqli_query( $conn, $query );
        /* Redirect browser to deletestudents*/
        mysqli_close($conn);
       //header( "refresh:5;url=deletestudent.php" );
        header( "Location:deletestudent.php" );
         exit();
         ?>
 <!--      /* 
        if(mysqli_num_rows($result)>0){
        
          //echo "<table><tr><th>ID</th><th>name</th><th>surname</th><th>fathername</th><th>grade</th><th>mobile</th><th>birthday</th></tr>";
          echo "<tbody>";
          while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row["name"]."</td><td>".$row["surname"]."</td><td>".$row["fathername"]."</td><td>".$row["grade"]."</td><td>".$row["mobilenumber"]."</td><td>".$row["birthday"]."</td"."<br>";
            echo "</tr>";
      }
        }else{