
<?php 

	function insert_data($name, $email, $password) {

		global $connection;

		$query  = "INSERT INTO users(name, email, password) ";
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

	function update_user_profile() {

		global $connection;

		if (isset($_POST['update'])) {

			$user_id = $_SESSION['id'];

			$address = mysqli_real_escape_string($connection, $_POST['address']);
			$pincode = mysqli_real_escape_string($connection, $_POST['pincode']);
			$gender  = mysqli_real_escape_string($connection, $_POST['gender']);
			$city    = mysqli_real_escape_string($connection, $_POST['city']);
			$state   = mysqli_real_escape_string($connection, $_POST['state']);

			$query  = "UPDATE users SET ";
			$query .= "address='$address', pincode='$pincode', gender='$gender', city='$city', state='$state' ";
			$query .= "WHERE id = '$user_id'";
			$insert_additional_data = mysqli_query($connection, $query);
			if (!$insert_additional_data) {
			echo 
			  "<div class='alert alert-danger text-center' role='alert'>
			    <strong>Oh snap!</strong> Change a few things up and try submitting again.
			  </div>" . mysqli_error($connection);
			}
			else {
			echo 
			  "<div class='alert alert-success text-center' role='alert'>
			    <strong>Success! </strong> Data updated successfully.
			  </div>";
			}

		}

	}

	function login() {

		global $connection;

		if (isset($_POST['login'])) {
			
			$username = mysqli_real_escape_string($connection, $_POST['username']);
			$email    = mysqli_real_escape_string($connection, $_POST['username']);
			$password = $_POST['password'];

			$query = "SELECT * FROM users WHERE name = '$username' OR email = '$email'";
			$result = mysqli_query($connection, $query);

			$count = mysqli_num_rows($result);
			if ($count < 1) {
				echo
				"<div class='alert alert-danger' role='alert'>
					<strong>Oh snap!</strong> You need to register first.
				</div>";
			}
			else {
				if ($row = mysqli_fetch_assoc($result)) {
					// $hashedPasswordCheck = password_verify($password, $row['password']);
					if ($password != $row['password']) {
   					echo
						"<div class='alert alert-danger' role='alert'>
							<strong>Oh snap!</strong> You entered a wrong password.
						</div>";
					}
					else {

						if ($username == "Brijesh" && $password == "brijesh") {
							header("Location: admin/index.php");
						} else {

						$_SESSION['id'] = $row['id'];
						$_SESSION['username'] = $row['name'];

						header("Location: index.php");
						exit();

						}

					}
				}
			}

		}

	}

	function navbar_login() {

		if (isset($_SESSION['id'])) {
	           echo
	                '<div class="form-inline my-2 my-lg-0 text-uppercase">
	                  <strong>Hello &nbsp;' . $_SESSION['username'] . ' ! &nbsp; &nbsp;</strong>
	                </div>
	                <form class="form-inline my-2 my-lg-0" action="" method="post">
	                   <ul class="navbar-nav mr-auto">
	                      <li class="nav-item">
	                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="logout" style="cursor: pointer;"><strong>LOGOUT</strong></button>
	                      </li>
	                   </ul>
	                </form>';
	    }
	    else {
	        echo
	            '<form class="form-inline my-2 my-lg-0">
	                <ul class="navbar-nav mr-auto">
	    	            <li class="nav-item">
	    	                <a class="btn btn-outline-primary" href="login.php" role="button"><strong>LOGIN</strong></a>
	                    </li>
	                    <li class="nav-item">
	                    	<a class="btn btn-outline-primary" href="register.php" role="button"><strong>REGISTER</strong></a>
	                    </li>
	                </ul>
	            </form>';
	    }

	}

	function logout() {

		if (isset($_POST['logout'])) {
		    session_unset();
		    session_destroy();
		    header("Location: index.php");
		    exit();
		}

	}

?>