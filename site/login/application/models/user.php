<?php
class user extends model {
	function create( $email, $password, $first_name, $last_name){ 
		$sql = "INSERT INTO users ( email, password, first_name, last_name, created_at ) VALUES ( '$email', '$password', '$first_name', '$last_name', NOW() ) ";

		mysql_query_excute($sql); 

		return mysql_insert_id();
	}

	function update( $user_id, $email, $password, $first_name, $last_name){ 
		$sql = "UPDATE users SET email = '$email', password = '$password', first_name = '$first_name', last_name = '$last_name' WHERE id = '$user_id' LIMIT 1";

		return mysql_query_excute($sql);
	}
	//
	// Return the number of users in the db
	//
	function count( ){
		$sql = "select count(1) FROM users";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$total = $row[0];
		return($total);
	}
	function page( $start, $num ){
		$sql = "SELECT * FROM users LIMIT " . $start . ", " . $num;
		$result = mysql_query_excute($sql);
		return mysql_fetch_assoc($result);
 	}

	function find_by_id( $id ){
		$sql = "SELECT * FROM users WHERE id = '$id' LIMIT 1";

		$result = mysql_query_excute($sql);

		return mysql_fetch_assoc($result);
	}

	function find_by_email( $email ){
		$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";

		$result = mysql_query_excute($sql);
 
		return mysql_fetch_assoc($result);
	}

	function find_by_email_and_password( $email, $password ){
		$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";

		$result = mysql_query_excute($sql);

		return mysql_fetch_assoc($result);
	}
}
