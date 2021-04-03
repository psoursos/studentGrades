<?php
session_start();
//echo "Hello World!";
//include('login.php');
include('header.php');
?>
<?php
include('footer.php');



//include('addstudent.php');
/*
$query = "SELECT * FROM Teachers";
$result = mysqli_query( $conn, $query );

if(mysqli_num_rows($result)>0){
    
  echo "<table><tr><th>ID</th><th>name</th><th>surname</th><th>username</th><th>password</th><th>email</th></tr>";
  while($row=mysqli_fetch_assoc($result)){
    echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["surname"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td><td>".$row["email"]."</td>"."<br>";
  echo"</table>";
  }
}else{
  echo "No results";
}
echo "<br>"."--------------------------------------------------------"."<br>";

$query = "SELECT * FROM Students";
$result = mysqli_query( $conn, $query );

if(mysqli_num_rows($result)>0){
    
  echo "<table><tr><th>ID</th><th>name</th><th>surname</th><th>fathername</th><th>grade</th><th>mobile</th><th>birthday</th></tr>";
  while($row=mysqli_fetch_assoc($result)){
    echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["surname"]."</td><td>".$row["fathername"]."</td><td>".$row["grade"]."</td><td>".$row["mobilenumber"]."</td><td>".$row["birthday"]."</td</tr>"."<br>";
  echo"</table>";
  }
}else{
  echo "No results";
}

mysqli_close($conn);

*/
?>

