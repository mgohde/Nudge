<!DOCTYPE html>
<html lang="en" ng-app="myapp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Nudge | towards more ethical outcomes</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">

	<!-- Firebase -->
    <script src="https://cdn.firebase.com/js/client/1.0.6/firebase.js"></script>

    <!-- AngularJS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.6/angular.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.6/angular-animate.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.6/angular-route.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.6/angular-sanitize.js'></script>
	<script src="assets/js/controller.js"></script>

	<!-- Firebase SimpleLogin -->
	<script src='https://cdn.firebase.com/js/simple-login/1.3.0/firebase-simple-login.js'></script>

    <!-- AngularFire Library -->
    <script src="https://cdn.firebase.com/libs/angularfire/0.7.1/angularfire.min.js"></script>

	<!-- textAngular -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/textAngular/1.2.0/textAngular.min.js" type="text/javascript"></script>

	
	

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body ng-controller="MyController">

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="index.html"><img src="assets/img/logo.png" width="100px"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.html">HOME</a></li>
            <li><a href="about.html">ABOUT</a></li>
            <li><a href="index.php">USE NUDGE</a></li>
            <li class='active'><a href="comments.php">COMMENTS</a></li>
            <li><a data-toggle="modal" data-target="#myModal" href="#myModal"><i class="fa fa-envelope-o"></i></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<div id="blue">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2" ng-hide="loginObj.user">
					<h4>We'd love to hear from you</h4>
					<p>please leave a comment below</p>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!--  bluewrap -->

	<div class="container desc">
		<div class="row" ng-hide="loginObj.user">
			<br><br>			
			<div class="col-lg-6 col-lg-offset-3 ">
				<form id="comments" method="post" id="comments"  action="thanks.php">

                                           Name
                                         <input type="text" id='name' name='name' class="form-control"/>
                                             <br>
                                           Email
                                         <input type="text" id='email' name='email'  class="form-control"/>
                                           <br> 
                                        <div class='row centered'>
                                      <textarea name='comment' rows='15' cols='40' id='comment'  /></textarea><br />
                                            
					<fieldset>
						<button type="submit" class="btn btn-info btn-xs">Submit</button><br><br>					  		
					</fieldset>		
                                       </div>				
				</form>								
			</div>
		</div> <!-- /.row -->
		
	</div> <!--/.container -->	
			<!-- FOOTER -->
	<div id="f">
		<div class="container">
			<div class="row centered">
				© 2017 Dowell Laboratory | University of Colorado Boulder				
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- Footer -->


	<!-- MODAL FOR CONTACT -->
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">contact us</h4>
	      </div>
	      <div class="modal-body">
		        <div class="row centered">
		        	<p>Our lab is housed in the <a target="_blank" href="http://jscbb.colorado.edu">Jennie Smoly Carothers Biotechnology Building</a>
home of the University of Colorado's <a target="_blank" href="http://biofrontiers.colorado.edu">BioFrontiers Insitute</a>.</p>
		        	<p>
						<b>Mailing Address - send envelopes here</b><br>
						Dowell Laboratory<br>
						University of Colorado JSCBB<br>
						596 UCB, Boulder, CO 80309<br>
					</p>
					<p>
						<b>Shipping Address - send packages here</b><br>
						Dowell Laboratory<br>
						3415 Colorado Ave<br>
						Boulder, CO 80303<br>
					</p>
					<p>Visit us online at <a href="http://dowell.colorado.edu" target="_blank">dowell.colorado.edu</a></p>
		        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
