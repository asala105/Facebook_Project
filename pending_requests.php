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
						<li class="active"><a href="facebook.php"><i class="glyphicon glyphicon-list-alt"></i> Home</a></li>
						<li><a href="friends.php"><i class="glyphicon glyphicon-list"></i> Friends</a></li>
						<li><a href="friend_requests.php"><i class="glyphicon glyphicon-paperclip"></i> Friend Requests</a></li>
						<li><a href="pending_requests.php"><i class="glyphicon glyphicon-refresh"></i> Pending Requests</a></li>
					</ul>
					<!-- tiny only nav-->
					<ul class="nav visible-xs" id="xs-menu">
						<li><a href="facebook.php" class="text-center"><i class="glyphicon glyphicon-list-alt"></i></a></li>
						<li><a href="friends.php" class="text-center"><i class="glyphicon glyphicon-list"></i></a></li>
						<li><a href="friend_requests.php" class="text-center"><i class="glyphicon glyphicon-paperclip"></i></a></li>
						<li><a href="pending_requests.php" class="text-center"><i class="glyphicon glyphicon-refresh"></i></a></li>
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
								<a href="facebook.php"><i class="glyphicon glyphicon-home"></i> Home</a>
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
						<div id="srch" class="row" style="padding-top:5rem" hidden>
								<table class="table">
									<thead>
									</thead>
									<tbody id="search_result">
									</tbody>
									</table>
							</div>
                            <div class="row padding">
                            <h3>List of Your Pending Requests</h3>
								<table  class="table">
									<thead>
										<tr>
										</tr>
									</thead>
									<tbody id="following_list">
									</tbody>
									</table>
							</div> 
						</div>
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
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/friends.js"></script>
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
</body>
</html>