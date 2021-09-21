<!DOCTYPE html>
<html lang="en">
	<head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Amigos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/facebook.css" rel="stylesheet">
		<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>
    
    <body>
		<div class="box">
			<div class="row row-offcanvas row-offcanvas-left">
				<!-- sidebar -->
				<div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
					<ul class="nav">
						<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
					</ul>
					<ul class="nav hidden-xs" id="lg-menu">
						<li class="active"><a href="facebook.php"><i class="fas fa-home"></i> Home</a></li>
						<li><a href="friends.php"><i class="fas fa-user-friends"></i> Friends</a></li>
						<li><a href="friend_requests.php"><i class="fas fa-users"></i> Friend Requests</a></li>
						<li><a href="pending_requests.php"><i class="fas fa-users"></i> Pending Requests</a></li>
					</ul>
					<!-- tiny only nav-->
					<ul class="nav visible-xs" id="xs-menu">
						<li><a href="facebook.php" class="text-center"><i class="glyphicon glyphicon-list-alt"></i></a></li>
						<li><a href="friends.php" class="text-center"><i class="fas fa-user-friends"></i></a></li>
						<li><a href="friend_requests.php" class="text-center"><i class="fas fa-users"></i></a></li>
						<li><a href="pending_requests.php" class="text-center"><i class="fas fa-users"></i></a></li>
					</ul>
				</div>
				<!-- /sidebar -->

				<!-- main right col -->
				<div class="column col-sm-10 col-xs-11" id="main">	
					<!-- top nav -->
					<div class="navbar navbar-blue navbar-static-top">  
						<div class="navbar-header">
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a href="facebook.php" class="navbar-brand logo">A</a>
						</div>
						<nav class="collapse navbar-collapse" role="navigation">
						<form class="navbar-form navbar-left" method="POST">
							<div class="input-group input-group-sm" style="max-width:360px;">
								<input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
								<div class="input-group-btn">
									<button id="search" class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
								</div>
							</div>
						</form>
						<ul class="nav navbar-nav">
							<li>
								<a href="facebook.php"><i class="fas fa-home"></i> Home</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown"><a href="notifications.php"><i class="fas fa-bell fa-lg"></i><span id="notifications_nb" class="badge"></span></a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
								<ul class="dropdown-menu">
									<li><a href="facebook.php">Profile</a></li>
									<li><a href="friends.php">Friends</a></li>
									<li><a href="friend_requests.php">Friend Requests</a></li>
									<li><a href="pending_requests.php">Pending Requests</a></li>
									<li><a href="php/logout.php">Logout</a></li>
								</ul>
							</li>
							</ul>
							</nav>
						</div>
						<!-- /top nav -->

						<div class="padding">
							<div class="full col-sm-9">
								<!-- content --> 
								<div id="srch" class="row" style="padding-top:5rem" hidden>
								<table class="table">
									<thead>
									</thead>
									<tbody id="search_result">
									</tbody>
									</table>
							</div>             
								<div class="row">
								<!-- main col left --> 
								<div class="col-sm-5" id="profile">
									<div class="panel panel-default">
										<div class="panel-thumbnail"><img src="img/bg_5.jpg" class="img-responsive"></div>
										<div class="panel-body">
											<p class="lead" id="name"></p>
											<p id="friends"> </p> <p id="followers"></p> <p id="following"></p>
											<p id="email"></p>
											<p id="birthday"></p>
											<a href="#" class="pull-right" data-toggle="modal" data-target="#profile_update">edit profile</a>
										</div>
									</div>
									<div class="well"> 
										<form id="status_update" action="php/status_update.php" method="POST" class="form-horizontal" role="form">
											<h4>Your Recent Status Update: </h4>
											<p id="status"></p>
											<hr>
											<h4>What's New</h4>
											<div class="form-group" style="padding:14px;">
												<input type='text' id="new_status" class="form-control" placeholder="Update your status">
											</div>
											<button id="update_status" class="btn btn-primary" type="button">Post</button><ul class="list-inline"></ul>
										</form>
									</div>
								</div>
								<!-- main col right -->
								<div class="col-sm-7">
								<div class="panel panel-default">
										<div class="panel-heading"><a href="#" class="pull-right" data-toggle="modal" data-target="#about_update">Edit my about me</a> <h4>About me</h4></div>
										<div class="panel-body">
											<div class="list-group">
												<p id="about_me"></p>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading"><a href="#" class="pull-right" data-toggle="modal" data-target="#address_update">Edit Address</a> <h4>My Address</h4></div>
										<div class="panel-body">
											<div class="clearfix"></div>
											<p id="country"></p>
											<hr><p id="city"></p>
											<hr><p id="addressLine"></p>
										</div>
									</div>
									
								</div>
							</div><!--/row-->
								<div class="row" id="footer">    
									<div class="col-sm-6">
									</div>
									<div class="col-sm-6">
									</div>
								</div>
								<hr>
								<h4 class="text-center">
								</h4>
								<hr>
							</div><!-- /col-9 -->
						</div><!-- /padding -->
					</div>
					<!-- /main -->
				</div>
			</div>
<!-- Modal -->
<div class="modal fade" id="about_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
        	</button>
        	<h5 class="modal-title" id="exampleModalLongTitle">Edit About Info.</h5>

    	</div>
		<form>
		<div class="modal-body">
			<div class="form-group" style="padding:14px;">
				<input type='text' id="new_about_me" class="form-control" placeholder="Update your about info">
			</div>			
    	</div>
		<div class="modal-footer">
		<button id="update_about" class="btn btn-primary" type="button">Save Changes</button>
		</div>
		</form>
    </div>
	</div>
</div>
      
<!-- Modal -->
<div class="modal fade" id="address_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
        	</button>
        	<h5 class="modal-title" id="exampleModalLongTitle">Edit Address</h5>

    	</div>
		<form>
		<div class="modal-body">
			<div class="form-group" style="padding:14px;">
				<input type='text' id="new_country" class="form-control" placeholder="Country">
			</div>	
			<div class="form-group" style="padding:14px;">
				<input type='text' id="new_city" class="form-control" placeholder="City">
			</div>	
			<div class="form-group" style="padding:14px;">
				<input type='text' id="new_address_line" class="form-control" placeholder="Enter the address line here">
			</div>			
    	</div>
		<div class="modal-footer">
		<button id="update_address" class="btn btn-primary" type="button">Save Changes</button>
		</div>
		</form>
    </div>
	</div>
</div>

<div class="modal fade" id="profile_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
        	</button>
        	<h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>

    	</div>
		<form>
		<div class="modal-body">
			<div class="form-group" style="padding:14px;">	
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="profile">
					<label class="custom-file-label" for="customFile">Add Profile Photo</label>
				</div>
			</div>
			<div class="form-group" style="padding:14px;">
				<input type='text' id="new_fname" class="form-control" placeholder="First Name">
			</div>	
			<div class="form-group" style="padding:14px;">
				<input type='text' id="new_lname" class="form-control" placeholder="Last Name">
			</div>	
			<div class="form-group" style="padding:14px;">
				<input type='email' id="new_address_line" class="form-control" placeholder="Email">
			</div>
			<div class="form-group" style="padding:14px;">
				<input type='date' id="new_address_line" class="form-control" placeholder="Birthday">
			</div>		
    	</div>
		<div class="modal-footer">
		<button id="update_profile" class="btn btn-primary" type="button">Save Changes</button>
		</div>
		</form>
    </div>
	</div>
</div>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
			$('[data-toggle=offcanvas]').click(function() {
				$(this).toggleClass('visible-xs text-center');
				$(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
				$('.row-offcanvas').toggleClass('active');
				$('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
				$('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
				$('#btnShow').toggle();
			});
        });
        </script>
		<script type="text/javascript" src="js/script2.js"></script>
		<script type="text/javascript" src="js/friends.js"></script>
</body>
</html>