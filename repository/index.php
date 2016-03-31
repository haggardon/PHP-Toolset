<!DOCTYPE html><head>
	<?php
		include 'db_handler.php';
		include 'show_php.php';
		include 'show_java.php';
	?>
	<title>PHP Toolbox - M.Sc. Thesis</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
</head>

<div class="container">
	<header>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-lg-6">
				<h1 class="logo"><a href="http://54.172.122.35">PHP Toolbox</a></h1>
			</div>
			<div class="col-xs-6 col-sm-6 col-lg-6">
				<h2 class="head_title">M.Sc. Thesis</h2>
			</div>
		</div>
	</header>
	<section id="main-content">
	<section id="features">
		<div class="row">
        <!-- Boxes de Acoes -->		
        <div class="col-xs-12 col-sm-12 col-lg-12">
			<div class="box">							
				<div class="icon">
					<div class="image"><i class="fa fa-files-o"></i></div>
					<div class="info">
						<h3 class="title">Metrics Repository</h3>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
		</div>		
		<div class="row">
        <!-- Boxes de Acoes -->		
        <div class="col-xs-6 col-sm-6 col-lg-6">
			<div class="box">							
				<div class="icon">
					<div class="image"><i class="icon-php"></i></div>
					<div class="info showrp">
						<h3 class="title">PHP Projects</h3>
						<?php
							show_php();
						?>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
		<div class="col-xs-6 col-sm-6 col-lg-6">
			<div class="box">							
				<div class="icon">
					<div class="image"><i class="icon-java"></i></div>
					<div class="info">
						<h3 class="title">Java Projects</h3>
						<?php
							show_java();
						?>					
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
		</div>			
		<!-- /Boxes de Acoes -->
	</section>
	<footer>
		<div class="row-fluid">
			<i class="fa fa-copyright"></i> 2015 Konstantinos Akritidis
		</div>
	</footer>
</div>
</body>
</html>