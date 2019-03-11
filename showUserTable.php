<? 
require_once("functions.php");

session_start();
if ($_SESSION['authenticated'] != true) {
  die("Access denied");	
}		
print_html_header("User Table");

$mysqli = db_connect();
$result = $mysqli->query("SHOW COLUMNS FROM userTableLilD");

echo '<table>';

echo '<tr>';
while ($row = $result->fetch_row()) {
	echo '<th>'.$row[0]."</th>";
}
echo '</tr>';

$result->close();
$result = $mysqli->query("SELECT * FROM userTableLilD");
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