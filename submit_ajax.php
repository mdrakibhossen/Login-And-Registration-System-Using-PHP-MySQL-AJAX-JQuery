<?php 
include "mysql_con.php";

if(isset($_POST['submit'])){
	$user_name = $_POST['user_name'];	
	$title = $_POST['title'];
	$content = $_POST['content'];


	$sql = "INSERT INTO `rakib_user`(`article_title`, `article_content`, `user_name`) VALUES ('$title','$content','$user_name')";
	$result = $dbh->query($sql);

	if($result){echo 1;}
	else{
		echo 4;
	}

}

?>