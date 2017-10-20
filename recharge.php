
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

    <title>Recharge | Book My Ticket</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

    <!-- Google Fonts CDN -->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu:400,700" rel="stylesheet">

    <!-- Font Awesome CDN -->
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
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
          <div class="container" id="padtopuser"> 
            <div class="card">
              <h5 class="card-header" style="background-color: #f7f7f7;">
                <center><strong>RECHARGE</strong></center>
              </h5>
              <div class="card-block">
                <h6 class="card-title" align="center">Enter your card number</h6>
                <hr>
                <div style="margin-left: 26%;">
                  <i class="fa fa-2x fa-cc-visa" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                  <i class="fa fa-2x fa-credit-card-alt" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                  <i class="fa fa-2x fa-cc-discover" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                  <i class="fa fa-2x fa-cc-mastercard" aria-hidden="true"></i>
                </div>
                <hr>
                <form>
                  <div class="form-group">
                    <label for="cardnumber">Card Number:</label>
                    <input type="number" class="form-control" id="cardnumber" placeholder="&bull; &bull; &bull; &bull; &nbsp; &bull; &bull; &bull; &bull; &nbsp; &bull; &bull; &bull; &bull; &nbsp; &bull; &bull; &bull; &bull;">
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="securitycode">Security Code:</label>
                        <input type="password" class="form-control" id="securitycode" placeholder="x x x">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="text" class="form-control" id="amount" placeholder="eg: $720">
                      </div>
                    </div>
                  </div>
                </form>
                <hr>
                <button type="button" class="btn btn-outline-primary btn-md btn-block" style="cursor: pointer; border-radius: 100px;"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;<b>CONFIRM</b></button>
                <hr>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3"></div>
      </div>
      <br>
      <hr>
      <footer>
        <p>&copy; Brijesh 2017</p>
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
