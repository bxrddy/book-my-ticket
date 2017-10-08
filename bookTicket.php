
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

    <title>Book Ticket | Book My Ticket</title>

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
                        <a class=\"nav-link active\" href='index.php'> HOME</a>
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
              <h5 class="card-header">
                <center><strong>BOOK TICKET</strong></center>
              </h5>
              <div class="card-block">
                <h6 class="card-title">Enter your source and destination ...</h6>
                <hr>
                <div class="row">
                  <div class="col-lg-6">
                    <form>
                      <div class="form-group">
                        <label for="source">Source</label>
                        <input type="text" class="form-control" id="source" placeholder="Enter Source">
                      </div>
                    </form>
                  </div>
                  <div class="col-lg-6">
                    <form>
                      <div class="form-group">
                        <label for="dest">Destination</label>
                        <input type="text" class="form-control" id="dest" placeholder="Enter Destination">
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="container">
                    <div id="map" style="height: 300px; width: 100%;">
                    <!-- This is the section where the map will be displayed -->
                    </div>
                    <br>
                    <script>
                      function initMap() {
                        // Specify the latitude and longitude of the region
                        var place = {lat: 19.0428, lng: 73.0230};

                        // google.maps.Map() => Creates a new google maps object
                        // document.getElementById() => Add this to find the map div on the web page
                        var map  = new google.maps.Map(document.getElementById('map'), {
                          zoom: 17,         // Set a zoom level
                          center: place
                        });
                        var marker = new google.maps.Marker({
                          position: place,   // This property sets the position of the marker
                          map: map
                        });
                      }
                    </script>
                  </div>
                </div>
                <a href="#" class="btn btn-primary">SEARCH</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
        <div class="container" id="padtopuser">
         
          <div class="card">
            <h5 class="card-header" align="center"><strong>WALLET</strong></h5>
            <img src="images/wallet3.png">
            <div class="card-block">
              <h3 class="card-title text-center">Current Balance</h3>
              <h2 class="card-text text-center"><strong><!-- &#x20B9; -->$890</strong></h2>
              <center><button type="submit" class="btn btn-primary" id="recharge" style="margin-bottom: 20%;">RECHARGE NOW</button></center>
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

   <!-- The async defer attribute allows the browser to continue rendering the rest of your page while the API loads -->
   <!-- The callback parameter executes the initMap function after the API loads -->
   <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOQFOPCVBm3_doNcda39oPes3kh5eihqc&callback=initMap"></script>

  </body>
</html>
