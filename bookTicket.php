
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

    <style type="text/css">
      
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #origin-input,
      #destination-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 200px;
        height: 40px;
      }

      #origin-input:focus,
      #destination-input:focus {
        border-color: #4d90fe;
      }

      #mode-selector {
        color: #fff;
        background-color: #4d90fe;
        margin-left: 12px;
        padding: 5px 11px 0px 11px;
      }

      #mode-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }


    </style>

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

    <br id="padtopuser">

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
                <hr style="width: 85%;">
                <div class="row">
                  <div class="col-lg-6">
                    <form>
                      <div class="form-group">
                        
                        <input type="text" class="form-control" id="origin-input" placeholder="Enter Source">
                      </div>
                    </form>
                  </div>
                  <div class="col-lg-6">
                    <form>
                      <div class="form-group">
                        
                        <input type="text" class="form-control" id="destination-input" placeholder="Enter Destination">
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div id="mode-selector" class="form-group">
                      <input type="radio" name="type" id="changemode-walking" checked="checked">
                      <label for="changemode-walking" style="cursor: pointer;">Walking</label>

                      <input type="radio" name="type" id="changemode-transit">
                      <label for="changemode-transit" style="cursor: pointer;">Transit</label>

                      <input type="radio" name="type" id="changemode-driving">
                      <label for="changemode-driving" style="cursor: pointer;">Driving</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="container">
                    <div id="map" style="height: 400px; width: 100%;">
                    <!-- This is the section where the map will be displayed -->
                    </div>
                    <br>
                     <script>
                        // This example requires the Places library. Include the libraries=places
                        // parameter when you first load the API. For example:
                        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

                        function initMap() {
                          var map = new google.maps.Map(document.getElementById('map'), {
                            mapTypeControl: false,
                            center: {lat: 19.0760, lng: 72.8777},
                            zoom: 11
                          });

                          new AutocompleteDirectionsHandler(map);
                        }

                         /**
                          * @constructor
                         */
                        function AutocompleteDirectionsHandler(map) {
                          this.map = map;
                          this.originPlaceId = null;
                          this.destinationPlaceId = null;
                          this.travelMode = 'WALKING';
                          var originInput = document.getElementById('origin-input');
                          var destinationInput = document.getElementById('destination-input');
                          var modeSelector = document.getElementById('mode-selector');
                          this.directionsService = new google.maps.DirectionsService;
                          this.directionsDisplay = new google.maps.DirectionsRenderer;
                          this.directionsDisplay.setMap(map);

                          var originAutocomplete = new google.maps.places.Autocomplete(
                              originInput, {placeIdOnly: true});
                          var destinationAutocomplete = new google.maps.places.Autocomplete(
                              destinationInput, {placeIdOnly: true});

                          this.setupClickListener('changemode-walking', 'WALKING');
                          this.setupClickListener('changemode-transit', 'TRANSIT');
                          this.setupClickListener('changemode-driving', 'DRIVING');

                          this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
                          this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

                          this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
                          this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
                          this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
                        }

                        // Sets a listener on a radio button to change the filter type on Places
                        // Autocomplete.
                        AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
                          var radioButton = document.getElementById(id);
                          var me = this;
                          radioButton.addEventListener('click', function() {
                            me.travelMode = mode;
                            me.route();
                          });
                        };

                        AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
                          var me = this;
                          autocomplete.bindTo('bounds', this.map);
                          autocomplete.addListener('place_changed', function() {
                            var place = autocomplete.getPlace();
                            if (!place.place_id) {
                              window.alert("Please select an option from the dropdown list.");
                              return;
                            }
                            if (mode === 'ORIG') {
                              me.originPlaceId = place.place_id;
                            } else {
                              me.destinationPlaceId = place.place_id;
                            }
                            me.route();
                          });

                        };

                        AutocompleteDirectionsHandler.prototype.route = function() {
                          if (!this.originPlaceId || !this.destinationPlaceId) {
                            return;
                          }
                          var me = this;

                          this.directionsService.route({
                            origin: {'placeId': this.originPlaceId},
                            destination: {'placeId': this.destinationPlaceId},
                            travelMode: this.travelMode
                          }, function(response, status) {
                            if (status === 'OK') {
                              me.directionsDisplay.setDirections(response);
                            } else {
                              window.alert('Directions request failed due to ' + status);
                            }
                          });
                        };

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
                <center><a href="recharge.php"><button type="submit" class="btn btn-primary" id="recharge" style="margin-bottom: 32%;">RECHARGE NOW</button></a></center>
              </div>
            </div>

          </div>
        </div>
      </div>
      <hr>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

   <!-- The async defer attribute allows the browser to continue rendering the rest of your page while the API loads -->
   <!-- The callback parameter executes the initMap function after the API loads -->
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoycDkBLOTsF7fUQMPmwDh9nZegklADFM&libraries=places&callback=initMap" async defer></script>

  </body>
</html>
