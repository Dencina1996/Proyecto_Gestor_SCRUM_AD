<?php
	function Connect() {
	  try {
	    $User = 'scrum';
	    $Password = 'P@ssw0rd';
	    $PDO = new PDO ("mysql:host=localhost;dbname=BD_Scrum","$User","$Password");

	  } catch (PDOException $e) {
	    echo "Failed to get db handler : ".$e->getMessage()."\n";
	  }
	  return $PDO;
	}
 ?>