<? 

session_start();
?>



<!DOCTYPE html>

<html>

  <meta charset="utf-8">

  <title>Insert user</title>

  <body>

  

<?

$action = $_POST['action'];



if ($action == "Insert User" ) {



  $usr = $_POST['username'];

  $pwd = $_POST['password'];

  $ust = $_POST['usertype'];

  $gms = $_POST['games'];

  $pts = $_POST['points'];

  $pwd = password_hash($pwd, PASSWORD_BCRYPT);

    

	$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");

				

	$sql = "INSERT INTO userTableLilD (username, password, usertype, games, points) VALUES ('$usr','$pwd', '$ust','$gms', '$pts')";

	

	if ($mysqli->query($sql)) {

      echo '<p>'.$usr. ' was inserted.</p>

            <p><a href="add_users.php">Insert Another User</a></p>';

      die();

   }

   elseif ($mysqli->errno == 1062) {

      echo '<p>'.$usr. ' already exists.</p>

            <p><a href="add_users.php">Insert Another User</a></p>';

      die();

   }

   else {

      die("Error ($mysqli->errno) $mysqli->error");

   } 

	

	$mysqli->close();

}

?>





  <form method="post" action="insert_user.php">

    <h2>Insert User</h2>

    <label>Username: <input type="text" name="username"></label><br>

    <label>Password: <input type="password" name="password"></label><br>

	<!--<label>Usertype: <input type="text" name="usertype"></label><br>

	<label>Games: <input type="text" name="games"></label><br>

	<label>Points: <input type="text" name="points"></label><br>

    -->

    <input type="submit" name="action" value="Insert User"> 

  </form>

	</body>

</html>