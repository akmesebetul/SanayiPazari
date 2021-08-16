<?php
try{
	 $db = new PDO("mysql:host=localhost;dbname=offers", "root", "");
	 
} catch ( PDOException $e ){
     print $e->getMessage();
     exit;
}
?>