<? 
require_once("functions.php");

session_start();
if ($_SESSION['authenticated'] != true) {
  die("Access denied");	
}

print_html_header("Home");

echo '
	<ol>
		<li><a href="trivia.php">Play Trivia</a></li>
		<li><a href="leader.php">View Leader Board</a></li>
		<li><a href="rank.php">Rank Questions</a></li>
		<li><a href="insert_question.php">Insert Question</a></li>
		<li><a href="delete_question.php">Delete Question</a></li>
		<li><a href="insert_user.php">Insert User</a></li>
		<li><a href="add_users.php">Add User</a></li>
		<li><a href="delete_user.php">Delete User</a></li>
		<li><a href="showUserTable.php">User Table</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ol>
	';

print_html_footer();
?>