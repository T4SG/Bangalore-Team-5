<?php

if (elgg_is_logged_in())
{
forward ('activity');
}
?>
<!DOCTYPE HTML>
<!--
	
-->
<html>
	<head>
		<title>Vrawa Theme | Elgg 1.8</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="mod/vrawa/js/jquery.min.js"></script>
		<script src="mod/vrawa/js/jquery.dropotron.min.js"></script>
		<script src="mod/vrawa/js/jquery.scrollgress.min.js"></script>
		<script src="mod/vrawa/js/skel.min.js"></script>
		<script src="mod/vrawa/js/skel-layers.min.js"></script>
		<script src="mod/vrawa/js/init.js"></script>
		 <link rel="stylesheet" type="text/css" href="mod/vrawa/css/form_style.css" />
			<link rel="stylesheet" href="mod/vrawa/css/skel.css" />
			<link rel="stylesheet" href="mod/vrawa/css/style.css" />
			<link rel="stylesheet" href="mod/vrawa/css/style-wide.css" />
		
		<!--[if lte IE 8]><link rel="stylesheet" href="mod/vrawa/css/ie/v8.css" /><![endif]-->
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
			<!--	<h1><a href="#">My Network</a></h1>-->
				<nav id="nav">
					<ul>
						<li><a href="register/">Register</a></li>
						
						<li><a href="forgotpassword/" class="button">Forgot Password?</a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				
				<h2>INDIA SCHOOL LEADERSHIP INSTITUTE</h2>
                                
			<section class="main">
				<form class="form-3" action="action/login" method="post">
<?php
$ts = time();
$token = generate_action_token($ts);
?>
				    <p class="clearfix">
				        <label for="login">Username</label>
				        <input type="text" name="username" id="login" placeholder="Username">
				    </p>
				    <p class="clearfix">
				        <label for="password">Password</label>
				        <input type="password" name="password" id="password" placeholder="Password"> 
				    </p>

<input type="hidden" name="__elgg_token" value="<?php echo $token; ?>"/>
<input type="hidden" name="__elgg_ts" value="<?php echo $ts; ?>" />
    
				    <p class="clearfix">
                                      <center>
				        <input type="submit" name="submit" value="Enter">
                                          </center>
				    </p>       
				</form>​
			</section>
				
			</section>

		<!-- Main -->
			<section id="main" class="container">
		
				<section class="box special">
					<header class="major">
						<h3>Every school in India will be led by an effective team leader who will create quality learning opportunities that prepare children for higher education and responsible citizenship.
</h3>
					
				<!--	</header>
					<span class="image featured" width="100px" height="50px"><img src="/var/elggdata/isli.jpeg" alt="" /></span>
				</section>-->
						
			<!--	<section class="box special features">
					<div class="features-row">
						<section>
							<span class="icon major fa-bolt accent2"></span>
							<h3>Modern</h3>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo</p>
						</section>
						<section>
							<span class="icon major fa-area-chart accent3"></span>
							<h3>Robust</h3>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo</p>
						</section>
					</div>
					<div class="features-row">
						<section>
							<span class="icon major fa-cloud accent4"></span>
							<h3>In the Cloud</h3>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo</p>
						</section>
						<section>
							<span class="icon major fa-lock accent5"></span>
							<h3>Security</h3>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo</p>
						</section>
					</div>
				</section>
					
				<div class="row">
					<div class="6u">

						<section class="box special">
							<span class="image featured"><img src="mod/vrawa/images/pic01.jpg" alt="" /></span>

							<h3>Featured Post #1</h3>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo... </p>

							<ul class="actions">
								<li><a href="#" class="button alt">Leer Más</a></li>
							</ul>
						</section>
						
					</div>
  					<div class="6u">-->
			
										<section class="box special">
					<span class="image featured"><img src="mod/vrawa/images/pic01.jpg" alt="" width="10" height="350" /></span>

						<!--	<h3>Featured Post #2</h3>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo...</p>
							<ul class="actions">
								<li><a href="#" class="button alt">Leer Más</a></li>
							</ul>-->
						</section>

					</div>
				</div>

			</section>
			
		<!-- CTA -->
			<section id="cta">
				
				<h4>ISLI is a non profit that trains school leaders such as principals and headmasters at NGO schools, government schools, and budget private schools. ISLI provides a two year training programme to school leaders across Mumbai, Pune, Hyderabad and Delhi. Their training includes monthly workshops followed by coaching and implementation support in the schools of participant leaders. Currently ISLI has grown to its capacity, providing training to approximately 200 principals across 4 cities.</h4>
				
			      
				
			</section>
			
		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					
					<li><a href="https://www.facebook.com/schoolleadership" class="icon fa-facebook" target='_blank'><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					
				</ul>
				<ul class="copyright">
					<li>&copy; India School Leadership Institute</li><li>Designed by: <a href="#">CFG Bangalore-Team-5</a></li>
				</ul>
			</footer>

	</body>
</html>
