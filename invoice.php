
<?php include("includes/db.php"); ?>
<?php include("includes/functions.php"); ?>

<?php session_start(); ?>

<?php 

  $query = "SELECT * FROM fare WHERE id = 1";
  $show_user_data = mysqli_query($connection, $query);

  if (!$show_user_data) {
    die("Query Failed!" . mysqli_error($connection));
  }
  else {
    while ($row = mysqli_fetch_assoc($show_user_data)) {
      $cost = $row['cost'];
      $src  = $row['source'];
      $dest = $row['destination'];
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Invoice | Book My Ticket</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

	<!-- Google Fonts CDN -->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu:400,700" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

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
                  $query = "SELECT * FROM users WHERE id = $user_id";
                  $show_user_data = mysqli_query($connection, $query);

                  if (!$show_user_data) {
                    die("Query Failed!" . mysqli_error($connection));
                  }
                  else {
                    while ($row = mysqli_fetch_assoc($show_user_data)) {
                      $address = $row['address'];
                      $city    = $row['city'];
                      $email   = $row['email'];
                    }
                  }
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

      <br>
      <hr id="padtopuser">
      <br>
      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 animated flipInX">
          <div class="container">
            <div class="card">
              <h5 class="card-header" style="background-color: #858585; color: white;">
                <center><strong>TICKET</strong></center>
              </h5>
              <div class="card-block" style="background-color: #f0f0f0;">
                <h4 class="card-title"><i class="fa fa-id-card-o" aria-hidden="true"></i> &nbsp;<b>Book My Ticket</b></h4>
                <hr>
                <div class="row">

                  <div class="col-lg-6">
                    To
                    <address>
                      <address>
                        <strong><?php echo $_SESSION['username']; ?></strong><br>
                        <?php echo $address; ?>, <?php echo $city; ?><br>
                        <?php echo $email; ?>
                      </address>
                    </address>
                    <span><h5><i class="fa fa-2x fa-opencart" aria-hidden="true"></i> <strong>&nbsp;&nbsp;PAID</strong></h5></span>
                  </div>
                
                  <div class="col-lg-6">

                    <div class="table-responsive">
                      <table class="table table-striped table-hover">
                        <thead>
                          <th>#</th>
                          <th>Source</th>
                          <th>Destination</th>
                          <th>Cost</th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td><?php echo $src; ?></td>
                            <td><?php echo $dest; ?></td>
                            <td><b>$<?php echo $cost; ?></b></td>
                          </tr>
                        </tbody>
                      </table>
                      <br>
                    </div>

                  </div>

                </div>
                <hr>

                <p class="" style="font-size: 14px;">With a mission to empower people to experience travel with ease, Book My Ticket invests in digital technology that helps take the friction out of travel.</p>

                <hr>
                <form class="for-group">
                  <a href="invoice-print.php"><button type="button" class="btn btn-primary pull-right" style="cursor: pointer;"><i class="fa fa-print" aria-hidden="true"></i> &nbsp;<b>Print</b></button></a>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-1"></div>
      </div>
      <br>
    <hr>
      <footer class="">
        <p><span><img src="images/ticket.png" height="22" width="25"></span>&nbsp; <strong>Book My Ticket</strong> | 2017</p>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
