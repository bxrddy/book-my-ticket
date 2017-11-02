
<?php include("includes/db.php"); ?>
<?php include("includes/functions.php"); ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Register | Book My Ticket</title>

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
		        </ul>
		        <form class="form-inline my-2 my-lg-0">
             <ul class="navbar-nav mr-auto">
               <li class="nav-item">
                  <a class="btn btn-outline-primary" href="login.php" role="button"><strong>LOGIN</strong></a>
               </li>
             </ul>
		        </form>
		    </div>
		
    </nav>

    <div class="container animated fadeIn">
      <section id="padtop">
      <center>
        <div class="card">
          <h3 class="card-header">Register Here ...</h3>
          <div class="card-block">
            <h6 class="card-title">Fill out the registration form.</h6>
            <hr>

            <?php 

              if (isset($_POST['register'])) {

                $name     =  mysqli_real_escape_string($connection, $_POST['name']);
                $email    =  mysqli_real_escape_string($connection, $_POST['email']);
                $password =  $_POST['password'];

                // INSERT DATA
                insert_data($name, $email, $password);

              }

            ?>
            
            <form method="post" action="">
              <div class="form-group">
                <label for="name">NAME:</label>
                <input type="text" class="form-control" id="name" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="Only letters allowed" placeholder="Enter your name" name="name" required="true">
              </div>
              <div class="form-group">
                <label for="emailaddress">EMAIL ADDRESS:</label>
                <input type="email" class="form-control" id="emailaddress" placeholder="Enter your email" name="email" required="true">
                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="password">PASSWORD:</label>
                <input type="password" class="form-control" id="password" name="password" pattern=".{6,}" title="Six or more characters"  required="true" placeholder="Enter new password">
              </div>
              <div class="form-check">
                <label class="checkbox">
                <input type="checkbox" class="checkbox" required="true"> &nbsp;I accept all the Terms &amp; Conditions.</label>
              </div>
              <button type="submit" class="btn btn-primary" id="registerSubmit" name="register">REGISTER</button>
            </form>
          </div>
        </div>
      </center>
      </section>

      <section id="footer">
      <hr>
        <marquee><p class="" style="font-size: 14px;">With a mission to empower people to experience travel with ease, Book My Ticket invests in digital technology that helps take the friction out of travel.</p></marquee>
      </section>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  </body>
</html>
