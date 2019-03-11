<?

// Connects to database
function db_connect() {
	return new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");	
}

// Print html header with bootstrap css and page title
function print_html_header($title) {
	$items['home.php'] = "Home";
	$items['insert_question.php'] = "Insert Question";	
	$items['trivia.php'] = "Play Trivia";	
	$items['leader.php'] = "View Leader Board";	
	$items['showUserTable.php'] = "View Users";
	if($_SESSION['usertype'] == 'admin'){
		$items['delete_question.php'] = "Delete Question";	
	}
	$items['logout.php'] = "Logout";	
	if($title == "Login"){
		$menu = "";
	}
	else{
		$menu = '<ul class="nav nav-pills">';
		foreach ($items as $key=>$value) {
			$active = "";
			if ($value==$title) $active = "active";
			$menu .= '
			<li class="nav-item">
				<a class="nav-link '.$active.'" href="'.$key.'">'.$value.'</a>
			</li>';
			}
		
		}
		$menu .= '</ul>';
	
	
	echo '
<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <title>'.$title.'</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container">
			'.$menu.'
			<h2>'.$title.'</h2>
	';
}

// Print html footer with bootstrap js
function print_html_footer() {
	echo '
		</div> <!-- /container -->	
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>
	</body>
</html>
	';
}

// Print the question table
function print_question_table($mysqli) {

	// First, print the columns, i.e, field names
	$result = $mysqli->query("SHOW COLUMNS FROM QuestionsLilD");
	echo '<table class="table table-striped">';
	echo '<thead class="thead-inverse">';
	echo '<tr>';
	while ($row = $result->fetch_row()) {
		echo '<th>'.$row[0]."</th>";
	}
	echo '</tr>';
	echo '<thead>';
	$result->close();
	
	// Second, print all the rows
	$result = $mysqli->query("SELECT * FROM QuestionsLilD ORDER BY id DESC");
	echo '<tbody>';
	while ($row = $result->fetch_row()) {
		echo '<tr>';
		foreach ($row as $value) {
			echo '<td>'.$value.'</td>';
		}
		echo '</tr>';
	}
	echo '</tbody>';
	echo '</table>';
	$result->close();
}

// Print the login form
function print_login_form($error) {
	echo '
  <form method="post" action="index.php">
    <label>
    	Username: 
    	<input name="username" type="text">
    </label>
    <label>
    	Password: 
    	<input name="password" type="password">
    </label>
    <p>
        <a href="insert_user.php">Register New Account</a>
    </p>
    <input type="submit" name="action" value="Login"> 
    '.$error.'
  </form>
  ';
}

// Print the insert question form 
function print_insert_question_form($error, $q, $a) {

	if ($error) 
		$message = "All fields must be filled out";

	echo '		
  <form method="post" action="insert_question.php">
  	
		<label>Question<br>
		<textarea name="question" rows="3">'.$q[0].'</textarea>
		</label><br>
		
		<label>Choice 1
		<br>
		<input type="text" name="choice1" size="50" value="'.$q[1].'">
		</label>
		<input type="radio" name="answer" value="1" '.$a[1].'>
		<br>
		
		<label>Choice 2
		<br>
		<input type="text" name="choice2" size="50" value="'.$q[2].'">
		</label>
		<input type="radio" name="answer" value="2" '.$a[2].'>
		<br>
		
		<label>Choice 3
		<br>
		<input type="text" name="choice3" size="50" value="'.$q[3].'">
		</label>
		<input type="radio" name="answer" value="3" '.$a[3].'>
		<br>
		
		<label>Choice 4
		<br>
		<input type="text" name="choice4" size="50" value="'.$q[4].'">
		</label>
		<input type="radio" name="answer" value="4" '.$a[4].'>
		<br>
					
		<input type="submit" name="action" value="Insert">
		'.$message.'
	</form>
	';
}

function print_question($q, $c1, $c2, $c3, $c4)  {
	echo '		
  <form method="post" action="get_question.php">
  	
		<label>Question<br>
		<textarea name="question" rows="3">'.$q.'</textarea>
		</label><br>
		
		<label>
		'.$c1.' 
		<input type="radio" name="answer" value="1">
		</label><br>
          
        <label>
		'.$c2.'
		<input type="radio" name="answer" value="2">
		</label><br>
          
        <label>
		'.$c3.' 
		<input type="radio" name="answer" value="3">
		</label><br>
          
        <label>
		'.$c4.'
		<input type="radio" name="answer" value="4">
		</label><br>
        
        <input type="submit" value="Next" name="action">
		'.$message.'
	</form>
	';
	
}
	
?>