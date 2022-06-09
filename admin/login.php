<?php
$conn = new mysqli("localhost:3306", "root", "" , "ImageStore");
if ($conn->connect_error) {
  echo "<script>
    var ok = alert('Connection failed: $conn->connect_error' );
    </script>";
}else if(isset($_POST["ID"]) and isset($_POST["password"])){
  $user = $_POST["ID"];
  $pass = $_POST["password"];

  $sql = 'SELECT * from Admins';
  $result_query = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result_query) > 0) {
    while ($row = mysqli_fetch_assoc($result_query)) {
      if ($user == $row["username"] && $pass == $row["password"]){
        $result = $user;
        break;
      } 
    }
  }
  if (empty($result)){
    $result = "Error: login failed!";
    echo "<script>
    var ok = alert('$result' );
    </script>";
  }else{
    session_start();
    $_SESSION["username"] = $result;
    header('Location: '."panel.php");
    exit();
  }
  
}


$conn->close();

?>




<html lang="en"> 
	<head>
		<link rel="stylesheet" href="style/login.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
	</head>
<body> 
	

	<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="login.php" method="post">
        <h3>Login Here</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="ID" id="username" name="ID">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">

        <button>Log In</button>

    </form>
</body> 
</html>
