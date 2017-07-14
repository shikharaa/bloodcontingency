<?php
session_start();
/* DATABASE CONFIGURATION */
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'bloodc');
define('DB_PASSWORD', 'password');
define('DB_DATABASE', 'BloodContingency');
define("BASE_URL", "http://localhost/BloodContingency/LoginPage.php/"); 


function getDB() 
{
	$dbhost=DB_SERVER;
	$dbuser=DB_USERNAME;
	$dbpass=DB_PASSWORD;
	$dbname=DB_DATABASE;
	try {
	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbConnection->exec("set names utf8");
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbConnection;
    }
    catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
	}
}
?>