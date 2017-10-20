
<?php include('includes/db.php'); ?>
<?php include('includes/functions.php'); ?>

<?php 

  if (isset($_GET['u_id'])) {
    $u_id = $_GET['u_id'];
  }

  $query = "SELECT * FROM users WHERE id = $u_id";
  $show_user_data = mysqli_query($connection, $query);

  if (!$show_user_data) {
    die("Query Failed!" . mysqli_error($connection));
  }
  else {
    while ($row = mysqli_fetch_assoc($show_user_data)) {
      $name     =   $row['name'];
      $email    =   $row['email'];
      $gender   =   $row['gender'];
      $city     =   $row['city'];
      $state    =   $row['state'];
      $address  =   $row['address'];
      $pincode  =   $row['pincode'];
    }
  }

?>

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>User Profile | Book My Ticket</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

	<!-- Google Fonts CDN -->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu:400,700" rel="stylesheet">

    <!-- Animate CSS -->
    <link href="css/animate.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-toggleable-md navbar-light fixed-top bg-faded">
    	
		    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		    </button>
	    	<a class="navbar-brand"><span><img src="images/ticket.png" height="30" width="33"></span>&nbsp; <strong>Book My Ticket </strong></a>

		    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
		      	<ul class="navbar-nav mr-auto">
		        	<li class="nav-item active">
		            	<a class="nav-link active" href="index.php"> HOME</a>
		          	</li>
		          	<!-- <li class="nav-item dropdown active">
		            	<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> SERVICES</a>
		            	<div class="dropdown-menu" aria-labelledby="dropdown01">
		             		<a class="dropdown-item" href="#">Train</a>
		              		<a class="dropdown-item" href="#">Bus</a>
		              		<a class="dropdown-item" href="#">Metro</a>
		            	</div>
		          	</li> -->
                <li class="nav-item active">
                  <a class="nav-link active" href="bookTicket.php"> BOOK TICKET</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link active"> USER PROFILE</a>
                </li>
		        </ul>
              
              <?php 

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

                logout();

              ?>

		    </div>
		
    </nav>

    <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="container" id="padtopuser">
          <div class="card">
            <h5 class="card-header" align="center"><strong>USER PROFILE</strong></h5>
            <div class="card-block">

              <div class="row">
                <div class="col-lg-12">

                  <?php 

                    update_user_profile();

                  ?>

                  <form action="" method="post">
                    <div class="form-group">
                      <label for="name">NAME:</label>
                      <input type="text" class="form-control" value="<?php echo $name; ?>" id="name" disabled>
                    </div>
                    <div class="form-group">
                      <label for="emailaddress">EMAIL ADDRESS:</label>
                      <input type="email" class="form-control" value="<?php echo $email; ?>" id="emailaddress" disabled>
                      <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="address">ADDRESS:</label>
                          <input type="text" class="form-control" value="<?php echo $address; ?>" id="address" placeholder="Enter your address" name="address">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="pincode">PINCODE:</label>
                          <input type="text" class="form-control" value="<?php echo $pincode; ?>" id="pincode" placeholder="Enter your pincode" name="pincode">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="gender">GENDER:</label>
                          <select class="form-control custom-select" id="gender" name="gender">
                            <option selected hidden>Select</option>
                            <option>Male</option>
                            <option>Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="city">CITY:</label>
                          <input class="form-control" value="<?php echo $city; ?>" type="text" id="city" placeholder="Enter your city" name="city">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="state">STATE:</label>
                          <input class="form-control" value="<?php echo $state; ?>" type="text" id="state" placeholder="Enter your state" name="state">
                        </div>
                      </div>
                    </div> 
                    <div class="form-group">
                      <!-- <label for="password">NEW PASSWORD:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter new password"> -->
                      <a href="">Change Password?</a>
                    </div>
                     <button type="submit" class="btn btn-primary" id="registerSubmit" name="update">UPDATE</button>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div> <!-- /container -->
      </div>
      <div class="col-lg-4">
        <div class="container" id="padtopuser">
         
          <div class="card">
            <h5 class="card-header" align="center"><strong>WALLET</strong></h5>
            <img src="images/wallet3.png">
            <div class="card-block">
              <h3 class="card-title text-center">Current Balance</h3>
              <h2 class="card-text text-center"><strong><!-- &#x20B9; -->$890</strong></h2>
              <center><a href="recharge.php"><button type="submit" class="btn btn-primary" id="recharge">RECHARGE NOW</button></a></center>
            </div>
          </div>

        </div>
      </div>
    </div>
    <hr>
      <footer>
        <p>&copy; Brijesh 2017</p>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  </body>
</html>
