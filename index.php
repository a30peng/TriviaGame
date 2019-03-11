<? 
require_once("functions.php");

session_start();

print_html_header("Login");


// Error is empty string
$error = "";

//Register an Account

//  Only process if $_POST is not empty and the Insert button was pressed 
if (empty($_POST) == false && $_POST['action'] == "Login") {
  $submitted_username = $_POST['username'];
  $submitted_password = $_POST['password'];
	// Connect to database and get stored password and usertype
	$mysqli = db_connect();		
	$result = $mysqli->query("SELECT password, usertype FROM userTableLilD WHERE username='$submitted_username'");
	$row = $result->fetch_row();
	$stored_password = $row[0];
	$mysqli->close();
	
	if ($submitted_password != "" && password_verify($submitted_password,$stored_password)) {
		$_SESSION['username'] = $submitted_username;
		$_SESSION['usertype'] = $row[1];
	   $_SESSION['authenticated'] = true;
	   header("Location: home.php");
	   die();
	}
	else {
		 $error = '<p>Login failed</p>';
	}
}

print_login_form($error);

print_html_footer();
?>

