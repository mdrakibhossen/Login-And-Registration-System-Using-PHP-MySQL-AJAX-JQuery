<?php
	include "mysql_con.php";
	if(isset($_POST['submit'])){
		$user_name = $_POST['user_name'];
		$user_sex = $_POST['user_sex'];
		$user_pass = $_POST['user_pass'];
		
		$sql = "INSERT INTO `rakib_user`( user_name, `user_sex`, `user_pass`) VALUES ('$user_name','$user_sex','$user_pass')";
		
		$result = $dbh->query($sql);
		
		if($result){
			echo '<script>
				// alert("'.$user_name.' , you are welcome"); 
				window.location.href="login.html";
				</script>' ;
		}
		else{
			echo "fail to register";
		}
	}
?>