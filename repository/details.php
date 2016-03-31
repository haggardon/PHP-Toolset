<!DOCTYPE html>
<head>
	<?php
		include 'db_handler.php';
		include 'show_details.php';
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
					<div class="image"><i class="icon-php"></i></div>
					<div class="info">
						<?php
							$project = $_GET['project'];
						?>
						<div class="row black">
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><h3 class="title"><?php echo $project?> --- Project Details</h3></div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><?php echo '<a href="/repository" class="btn btn-danger alignright" role="button">Back to Repository</a>'; ?></div>
						</div>
						<?php
							show_details($project);
						?>

					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
		</div>		
	</section>	
	<div class="scroll-top-wrapper ">
		<span class="scroll-top-inner">
			<i class="fa fa-2x fa-arrow-circle-up"></i>
		</span>
	</div>
	<footer>
		<div class="row-fluid">
			<i class="fa fa-copyright"></i> 2015 Konstantinos Akritidis
		</div>
	</footer>
</div>
<script>
 
$(function(){
 
	$(document).on( 'scroll', function(){
 
		if ($(window).scrollTop() > 100) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});
});
</script>
<script>
 
$(function(){
 
	$(document).on( 'scroll', function(){
 
		if ($(window).scrollTop() > 100) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});
 
	$('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}
</script>
</body>
</html>