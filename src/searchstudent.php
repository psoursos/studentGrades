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
 <html lang="en">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="css/style1.css">
     <title>Student Manager</title>
   </head>
   <body>
     <!--Οn Submit send form data to -->
     <!-- <form action="form_post.php" method="post">-->
       <div class='search-form'>
     <form class="form-inline1"action="<?php echo htmlspecialchars( $_SERVER["PHP_SHELF"] ); ?>" method="POST">
         <!--<form class="form-inline1" action="<?php// echo htmlspecialchars( $_SERVER["PHP_SHELF"] ); ?>" method="post">-->
           <label for="name"><h1>Search:</h1></label>
           <input type="text" placeholder="Eg.name,surname,mobile" name="search">
           <button type="submit" name="submit-search">Search</button>
          </form>
</div>
       <?php
    //connect to db
    include('connection.php');
    if(isset($_POST['submit-search'])){
      $search = mysqli_real_escape_string($conn, $_POST['search']);
      $query = "SELECT * FROM Students Where surname LIKE '%$search%' OR name LIKE '%$search%' OR mobilenumber LIKE '%$search%' ";
      $result = mysqli_query( $conn, $query );
   

    if(mysqli_num_rows($result)>0){ ?>
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
      //echo "<table><tr><th>ID</th><th>name</th><th>surname</th><th>fathername</th><th>grade</th><th>mobile</th><th>birthday</th></tr>";
      echo "<tbody>";
      while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row["name"]."</td><td>".$row["surname"]."</td><td>".$row["fathername"]."</td><td>".$row["grade"]."</td><td>".$row["mobilenumber"]."</td><td>".$row["birthday"]."</td"."<br>";
        echo "</tr>";
        //
  }
    }else{
          echo "<h2>No results</h2>";
          }
          echo "</tbody>";
          echo"</table>";

}
  // close connection to db
  mysqli_close($conn);
  ?>
    </body>
  
  <?php include('footer.php');  ?>
</html>