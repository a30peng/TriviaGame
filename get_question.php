<? 
require_once("functions.php");

session_start();
if ($_SESSION['usertype'] != 'admin') {
  die("Access denied");	
}
print_html_header("Play Trivia");

if (empty($_GET) == false && $_GET['id'] != "") {
	$id = $_GET['id'];
	$mysqli = db_connect();				
	$mysqli->query("DELETE FROM Questions WHERE id=$id");
	$mysqli->close();
}
$mysqli = db_connect();

$sql = "SELECT question, choice1, choice2, choice3, choice4 FROM Questions13579 ORDER BY RAND()";
$result = $mysqli->query($sql);

            $row = $result->fetch_row();
            $q = $row[0];
            $c1 = $row[1];
            $c2 = $row[2];
            $c3 = $row[3];
            $c4 = $row[4];

            $result->close();
            $mysqli->close();


print_question($q, $c1, $c2, $c3, $c4);

print_html_footer();
?>
