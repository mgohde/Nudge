<?php
session_start();
?>
<!---
Site : http:www.smarttutorials.net
Author :muni
--->

 
<?php
require 'config.php';
require 'image_dictionary.php'; 

$name = $_SESSION['name']; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nudge | Dowell Lab</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
       
        <link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="assets/css/main.css" rel="stylesheet" media="screen">
        <link href="assets/css/menu.css" rel="stylesheet" media="screen">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" media="screen"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script type="text/javascript"> 
			$(document).ready(function(){
				$(".charBig").click(function(){ 
					$.ajax({
						url: "redirect.php",
						type: "post",
						data: {myData: "Authorship"}, 
						dataType: "text",
						cache: false,
						success: function(data, textStatus, jqXHR){
							//alert( this.data + "," + this.url); test
							var url = 'copy2.php';
							window.location.href = url;
						},
						error: function(){
							alert("Please try again."); 
						}
					});
				});
				$(".dataChar2").click(function(){
					$.ajax({
						url: "redirect.php",
						type: "post",
						data: {myData: "Falsification"},
						dataType: "text", 
						cache: false, 
						success: function(data, textStatus, jqXHR){
							var url = 'copy2.php';
							window.location.href = url;
						},
						error: function(){
							alert("Please try again."); 
						}
					});
				}); 
			});
			
			function redirect(storyname)
			{
				$.ajax({
					url: "redirect.php",
					type: "post",
					data: {myData: storyname}, 
					dataType: "text",
					cache: false,
					success: function(data, textStatus, jqXHR){
						//alert( this.data + "," + this.url); test
						var url = 'copy2.php';
						window.location.href = url;
					},
					error: function(){
						alert("Please try again."); 
					}
				});
			}
			
			function printError(){
				document.getElementById("char-locked").innerHTML = "Collect 4 badges to unlock the data falsification story."; 
			}
			function hideError(){
				document.getElementById("char-locked").innerHTML = ""; 
			}
		</script>
        <style>
            .container {
                margin-top: 110px;
            }
            .error {
                color: #B94A48;
            }
            .form-horizontal {
                margin-bottom: 0px;
            }
            .hide{display: none;}
        </style>
    </head>

    <body ng-controller="MyController" class="MyMenu">
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
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
	<div class="container select-character ">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<p class="text-center user">
					Welcome to Nudge: <?php if(!empty($_SESSION['name'])){echo $_SESSION['name'];} else{echo 'undefined user';}?>
				</p>
				<h1 class="message">
					Choose a character: 
				</h1>
				<p class="message">Each character has a specific ethical category associated with them.</p>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 ">
				<table style="margin:0px auto;">
					<tbody>
						<tr>
							<?php
							        //Check how many badges the current user has, if they have 4 or more, then the next storyline, data falsification, is available, if not, print message error message, refer to printError() for details 										
								$category = "Authorship"; //set $category to Authorship because badges collected from this category unlock the next one. 
								//Note: This line used to check for storyline title AND username. Since this behavior doesn't make sense with more than just a few stories,
								//it has been reduced to username in general.
								$endings = mysqli_query($con, "select distinct ending from play where name='$name'") or die(mysql_error());
								$current_badges = array();
								
								while( $row = mysqli_fetch_array($endings)){ 
									$ending = $row['ending']; 
									$ending_query = mysqli_query($con, "select end_id from rewardss where end='$ending'") or die(mysqli_error());
									$end_id = mysqli_fetch_row($ending_query); 
									array_push($current_badges, $end_id[0]); 
								}
								
								//Look up all storylines in the storyref table:
								$curbadgecount=count($current_badges);
								$stories=mysqli_query($con, "select * from storystat order by minbadges") or die(mysql_error());
								$lockedstorylist=array();
								
								while($row=mysqli_fetch_array($stories))
								{
									$minbadges=$row['minbadges'];
									$neutralgraphic=$row['neutralgraphic'];
									$gesturinggraphic=$row['gesturinggraphic'];
									$lockedgraphic=$row['lockedgraphic'];
									$storyname=$row['storyname'];
									
									print "<td style=\"width:auto;\">";
									if($curbadgecount>=$minbadges)
									{
										print "<div id=\"storyboard-image-large-container\" class=\"postDoc-container\" onMouseOut=\"hideError()\" onclick=\"redirect('$storyname');\">";
										print "<div class=\"charSmall\"><img src=\"$neutralgraphic\"></div>";
										print "<div class=\"charBig\"><a><img src=\"$gesturinggraphic\"></a></div>";
										print "<br><h4 class=\"message\" style=\"width:auto; padding: 10px\">$storyname</h4>";
										print "</div>";
									}
									
									else
									{
										array_push($lockedstorylist, $storyname);
										print "<div id=\"storyboard-image-large-container\" class=\"postDoc-container\" onMouseOut=\"hideError()\">";
										if($lockedgraphic!=NULL)
										{
											print "<div class=\"charSmall\"><a><img src=\"$lockedgraphic\" onmouseover=\"printError();\"></a></div>";
										}
										
										else
										{
											print "<div class=\"charSmall\"><a><img src=\"$neutralgraphic\" onmouseover=\"printError();\" style=\"opacity: 30;\";></a></div>";
										}
										print "<br><h4 class=\"message\" style=\"width:auto; padding: 10px; color: darkgray;\">$storyname</h4>";
										print "</div>";
									}
									
									print "</td>";
									print "<td style=\"padding: 20px;\"></td>";
								}
							?>
						</tr>
						<tr>
							<?php
							/*
								$storylist=mysqli_query($con, "select storyname from storystat") or die(mysql_error());
								
								while($row=mysqli_fetch_array($storylist))
								{
									$name=$row['storyname'];
									$locked=0;
									
									foreach($lockedstorylist as $lockedname)
									{
										# Note: Can also use strcmp and logical or if necessary.
										if($lockedname==$name)
										{
											$locked=1;
										}
									}
									
									if(!$locked)
									{
										print "<td><h4 class=\"message\" style=\"width:auto; padding: 10px\">$name</h4></td>";
									}
								}*/
							?>
							<!--
							<td>
								<h4 class="message" style="width:auto;">Authorship</h4>
							</td>
							<td style="padding: 10px;"></td>
							<td>
								<div style="width:auto; margin-left: 4px;"><h4 class="message">Falsification</h4></div>
							</td>-->
						</tr>
					</tbody>
				</table>
				<div><h3 style="color: red; text-align: center;" id="char-locked"></h3></div>
			</div>
		</div>
		</hr>
   </div>
   <footer>
		<p style="margin-top: 80px;" class="text-center" id="foot">
			&copy; <a href="http://dowell.colorado.edu/" target="_blank">Dowell Lab </a>2017
		</p>
	</footer>
	</body>
</html>

