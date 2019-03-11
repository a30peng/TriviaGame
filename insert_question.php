<? 
require_once("functions.php");

session_start();
if ($_SESSION['authenticated'] != true) {
  die("Access denied");	
}

print_html_header("Insert Question");

// Assume no submission error
$error = false;

// More compact numeric array for storing question data
$q = array();

// For keeping track of which radio button was checked
$a = array();

//  Only process if $_POST is not empty and the Insert button was pressed 
if (empty($_POST) == false && $_POST['action'] == "Insert") {

	// Put the data in a more compact numeric array
	$q[0] = $_POST['question'];
	$q[1] = $_POST['choice1'];
	$q[2] = $_POST['choice2'];
	$q[3] = $_POST['choice3'];
	$q[4] = $_POST['choice4'];
	$q[5] = $_POST['answer'];
	
	// Keep track of which radio button should stay checked if there is an error
	$a[$_POST['answer']] = "checked";
	
	// Check for blank input
	foreach ($q as $value) {
		if ($value == "") {
			$error = true;
			break;
		}
	}
	
	// Make sure all the data is present
	if ($error == false) {	
		$mysqli = db_connect();				
		$sql = "INSERT INTO QuestionsLilD (question, choice1, choice2, choice3, choice4, answer) VALUES ('".$q[0]."','".$q[1]."','".$q[2]."','".$q[3]."','".$q[4]."','".$q[5]."')";
		$mysqli->query($sql);

		echo '<a href="insert_question.php">Insert Another Question</a>';
		
		print_question_table($mysqli);
		
		$mysqli->close();
	}
}

// If the post is not set or if there is an error
if (empty($_POST) == true || $error == true) {
	print_insert_question_form($error, $q, $c);
}

print_html_footer();
?>
