<? 
require_once("functions.php");

session_start();
/*if ($_SESSION['authenticated'] != true) {
  die("Access denied");	
}	
*/
print_html_header("Question Table");

$mysqli = db_connect();
$result = $mysqli->query("SHOW COLUMNS FROM questionsLilD");

echo '<table>';

echo '<tr>';
while ($row = $result->fetch_row()) {
	echo '<th>'.$row[0]."</th>";
}
echo '</tr>';

$result->close();
$result = $mysqli->query("SELECT * FROM questionsLilD");
while ($row = $result->fetch_row()) {
    
    echo '<tr>';

    foreach ($row as $value) {
		echo '<td>'.$value.'</td>';
	}

	echo '</tr>';
}

echo '</table>';

$result->close();
$mysqli->close();
print_html_footer();
?>