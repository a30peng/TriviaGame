<?
session_start();
if ($_SESSION['authenticated'] != true) {
  die("Access denied");	
}	

require_once("functions.php");

$mysqli = db_connect();			
$sql = "CREATE TABLE QuestionsLilD ( 
					id INT NOT NULL AUTO_INCREMENT,
					question VARCHAR(1024) NOT NULL,
					choice1 VARCHAR(1024) NOT NULL,
					choice2 VARCHAR(1024) NOT NULL,
					choice3 VARCHAR(1024) NOT NULL,
					choice4 VARCHAR(1024) NOT NULL,
					answer INT NOT NULL, 
					PRIMARY KEY (`id`) 	
				)";
$mysqli->query($sql);

echo $mysqli->error;

// Use the result

//$result->close();
$mysqli->close();
?>