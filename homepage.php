<?php 
session_start();
$user_name = $_SESSION['name'];	
echo "Username : " .$user_name;

?> 


<!DOCTYPE html>

<html lang="">
<head>
<title>Home Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="css/style.css" />

</head>
<body id="top">

<div><p align="right"><button class="logout"><a href="login.html">Logout</a></button></p></div>




 <div align="center">
  <h3 align="center">Post Your Own Content</h3>

  <form action="insert.php" method="POST">
  <table>
   <tr>
    <td><input style="width: 600px;" type="text" name="topic" placeholder="Topic" required></td>
   </tr>
   <tr>
   </tr> 

  <tr>
    <td><input style="width: 600px; height: 100px;" type="text" name="content" placeholder="News" required></td>
   </tr>
    
   <tr>
    <td></td>
    <td><input type="submit" value="Post"></td>
   </tr>
  </table>
 </form>
     





<?php
  
  $conn = mysqli_connect("localhost", "root", "", "rakib");
  if ($conn-> connect_error) {
    die("Connection Failed : ". $conn-> connect_error);
  }


  //sql to delete record
if(isset($_REQUEST['submit'])){
  $sql = "DELETE FROM rakib_post WHERE id = {$_REQUEST['id']}";
  if(mysqli_query($conn, $sql)){
    echo "Record Deleted".'<br>';
  }
  else{
    echo "Error Unable to delete record";
  }
}




  $sql = "select id, topic, content from rakib_post";
  $result = $conn->query($sql);

  if($result-> num_rows > 0){
    while ($row = $result-> fetch_assoc()) {
      echo $row['topic'].'<br>'.$row['content'].'<br>'.'<br>';
      echo '<form action="" method="POST"><input
      type="hidden" name="id" value=' . $row['id'] . '><input type="submit" class="btn btn-sm btn-danger" name="submit" value="Delete"></form>'.'<br>'.'<br>'.'<br>'.'<br>';

    }
  }
  else{
    echo "There Have No Result. ";
  }

  $conn -> close();


?>


</div>


<script src="jquery.js"></script>
</body>
</html>
