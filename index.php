
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

    <title>Home | Book My Ticket</title>

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
              
              <?php 

                if (isset($_SESSION['id'])) {
                  $user_id = $_SESSION['id'];
                  echo
                      "<li class=\"nav-item active\">
                        <a class=\"nav-link active\" href=''> HOME</a>
                       </li>
                       <li class=\"nav-item active\">
                        <a class=\"nav-link active\" href=\"bookTicket.php\"> BOOK TICKET</a>
                       </li>
                       <li class=\"nav-item active\">
                        <a class=\"nav-link active\" href='user.php?u_id=$user_id'> USER PROFILE</a>
                       </li>";
                }

              ?>

		        </ul>

            <?php

              navbar_login();
              logout();

            ?>

		    </div>
		
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3 animated fadeInDown">#OneTicket</h1>
        <h1 class="display-5 animated fadeInDown"></h1>
        <h1 class="display-5 animated fadeInDown">Be Smart!</h1>
       
       <!--  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> -->
       <button type="button" class="btn btn-lg btn-primary animated fadeInLeft">Learn More &raquo;</button>
      </div>
    </div>

    <div class="container">
      <hr>
      <!-- Example row of columns -->
      <div class="row">
		<div class="col-sm-12">
			<h2 align="center" class="animated fadeIn">Oh Yeah! You heard it right...</h2><br>
		</div>      	
      </div>
      <center>
      <div class="row">
        	<div class="col-lg-4 col-xs-6">
                <div class="thumbnail">
                    <img src="images/train.png" height="105" width="170" style="margin-top: 20px; margin-bottom: 7%;" class="animated fadeIn">
                    <h3 style="font-size: 23px; margin-top: 10px;" class="animated fadeIn"><strong>TRAIN</strong></h3>
                    <p style="font-size: 18px;" class="animated fadeIn">There's something about the sound of a train that's very romantic and nostalgic and hopeful.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail">
                    <img src="images/bus.jpg" height="105" width="105" style="margin-top: 20px; margin-bottom: 7%;" class="animated fadeIn">
                    <h3 style="font-size: 23px; margin-top: 10px;" class="animated fadeIn"><strong>BUS</strong></h3>
                    <p style="font-size: 18px;" class="animated fadeIn">Know how to travel from your town to a nearby town without a car, either by bus or by rail.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail img-responsive">
                    <img src="images/metro.png" height="105" width="105" style="margin-top: 20px; margin-bottom: 7%;" class="animated fadeIn">
                    <h3 style="font-size: 23px; margin-top: 10px;" class="animated fadeIn"><strong>METRO</strong></h3>
                    <p style="font-size: 18px;" class="animated fadeIn">An optimist is a driver who thinks that empty space at the curb won't have a hydrant beside it.</p>
                </div>
            </div>                 
        </div>
        </center>
      <hr>
      <br>
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
