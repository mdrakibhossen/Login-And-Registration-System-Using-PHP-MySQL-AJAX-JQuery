<?php
include "mysql_con.php";
if(isset($_POST['submit'])){
	$user_name = $_POST['user_name'];
	$user_pass = $_POST['user_pass'];
	$sql = "select * from rakib_user where user_name = '$user_name' and user_pass = '$user_pass' ";
	$result = $dbh->query($sql);
	$row_exist = $result->fetch();
	
	if($row_exist){
		session_start();
		$_SESSION['name'] = $user_name;			
		echo '<script>
				window.location.href="homepage.php";
				</script>' ;
	}
	else{
		echo  '<script>
				alert("Invalid username and password!");
				</script>' ;
	}
}
?>  


