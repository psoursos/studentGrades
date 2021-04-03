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
    <!--Navbar-->
  <nav id="navbar">
    <h1 class="logo">
      <span class="text-primary">Student Manager</span>
    <h1>
      <?php
      // navbar when user is logged in 
      if( $_SESSION['loggedInUser'] ) {
        ?>
    <ul>
      <li><a href="teacher.php">Home</a></li>
      <li><a href="addstudent.php">Add</a></li>
      <li><a href="editstudent.php">Edit</a></li>
      <li><a href="deletestudent.php">Delete</a></li>
      <li><a href="searchstudent.php">Search</a></li>
      <p class="text-primary">Welcome <?php echo $_SESSION['loggedInUser']; ?> !</p>
      <li><a href="logout.php">Log-out</a></li>
      
     <!-- <p><button onclick="window.location.href ='logout.php'"; class="log-out-btn">Log out</button></p> -->
    </ul>
    <?php
      }  else {
        ?>
        <ul>
          <p class="text-primary">></p>
           <li><a href="login.php">Log-in</a></li>
        </ul>
        <?php
      }
       ?>
     
  </nav>
</body>
</html>