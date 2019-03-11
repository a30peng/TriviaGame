<? 
session_start();
if ($_SESSION['authenticated'] != true) {
  die("Access denied");	
}	
require_once("functions.php");

$mysqli = db_connect();			
$sql = "CREATE TABLE userTableLilD ( 
					username VARCHAR(64) NOT NULL, 
					password VARCHAR(64) NULL, 
					usertype VARCHAR(64) NOT NULL DEFAULT 'normal', 
					games INT NOT NULL DEFAULT '0', 
					points FLOAT NOT NULL DEFAULT '0.0', 
					PRIMARY KEY (username) 	
				)";
$mysqli->query($sql);

echo $mysqli->error;

$mysqli->close();
?>