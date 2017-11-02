
<?php include("includes/db.php"); ?>
<?php include("includes/functions.php"); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Login | Book My Ticket</title>

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
                  <a class="btn btn-outline-primary" href="register.php" role="button"><strong>REGISTER</strong></a>
               </li>
             </ul>
		        </form>
		    </div>
		
    </nav>

    <div class="container animated fadeIn">
    	<section id="padtop">
    	<hr><br>
    	<center>
	    	<div class="card">
	  			<h3 class="card-header">Login Here...</h3>
	  			<div class="card-block">
	    			<h6 class="card-title">Enter your username and password.</h6>
	    			<hr>

	    			<?php login(); ?>

	    			<form action="" method="post">
		              <div class="form-group">
		                <label for="name">USERNAME:</label>
		                <input type="text" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="Enter your registered username" class="form-control" id="name" placeholder="Enter your username" required="true" name="username">
		              </div>
		              <div class="form-group">
		                <label for="password">PASSWORD:</label>
		                <input type="password" class="form-control" id="password" placeholder="Enter your password" required="true" name="password">
		              </div>
		              <div class="form-check">
		                <label class="checkbox">
		                <input type="checkbox" class="checkbox"> &nbsp;Keep me signed in</label>
		              </div>
		              <button type="submit" class="btn btn-primary" id="registerSubmit" name="login">LOGIN</button>
		            </form>
	  			</div>
			</div>
		</center>
		</section>
		<br>
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