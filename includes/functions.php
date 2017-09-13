
<?php 

	function insert_data($name, $email, $password) {

		global $connection;

		$query  = "INSERT INTO registration(name, email, password)";
		$query .= "VALUES ('$name', '$email', '$password')";
		$insert_data = mysqli_query($connection, $query);
		if (!$insert_data) {
			echo 
				"<div class='alert alert-danger text-center' role='alert'>
					<strong>Oh snap!</strong> Change a few things up and try submitting again.
				</div>";
		}
		else {
			echo 
				"<div class='alert alert-success text-center' role='alert'>
					<strong>Success! </strong> You can now login in.
				</div>";
		}

	}	

?>