    <?php
    $topic = $_POST['topic'];
    $content = $_POST['content'];
    
    if (!empty($topic)  || !empty($email) || !empty($content)) {
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "rakib";
        //create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
        if (mysqli_connect_error()) {
         die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } else {
         $SELECT = "SELECT id From rakib_post Where id = ? Limit 1";
         $INSERT = "INSERT Into rakib_post (topic, content) values('$topic', '$content')";
         //Prepare statement
         $stmt = $conn->prepare($SELECT);
         $stmt->store_result();
         $rnum = $stmt->num_rows;
         if ($rnum==0) {
          $stmt->close();
          $stmt = $conn->prepare($INSERT);
          // $stmt->bind_param("ssssii", $topic, $email, $content);
          $stmt->execute();
          echo '<script>
				window.location.href="homepage.php";
				</script>' ;
         } else {
          echo "";
          echo "<p>Go Back to homepage page <a href='homepage.php'>Click Here Here</a></p>";
         }
         $stmt->close();
         $conn->close();
        }
    } else {
     echo "All field are required";
     echo "<p>Go Back to homepage page <a href='homepage.php'>Click Here Here</a></p>";
     die();
    }
    ?>