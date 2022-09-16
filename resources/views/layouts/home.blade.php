<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>-->

	<script defer src="https://use.fontawesome.com/releases/v6.2.0/js/all.js"  crossorigin="anonymous"></script>
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->


	<link rel="shortcut icon" href="https://assets.nflxext.com/ffe/siteui/common/icons/nficon2016.ico">
	<link rel="stylesheet" href="/css/layout/home.css">
	<script src="/external/jquery/jquery-3.5.1.min.js"></script>
	<script src="/external/jquery/popper.min.js"></script>
	<script src="/js/layout/home.js"></script>
	@yield('script')
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="animeflixLogo">
			<a id="logo" href="#home"><img src="https://github.com/carlosavilae/Netflix-Clone/blob/master/img/logo.PNG?raw=true" alt="Logo Image"></a>
			</div>      
			<nav class="main-nav">                
				<a href="#home">Home</a>
				<a href="#tvShows">TV Shows</a>
				<a href="#movies">Movies</a>
				<a href="#originals">Originals</a>
				<a href="#">Recently Added</a>
				<a target="_blank" href="https://codepen.io/cb2307/full/NzaOrm">Portfolio</a>        
			</nav>
			<nav class="sub-nav">
				<a href="#"><i class="fas fa-search sub-nav-logo"></i></a>
				<a href="#"><i class="fas fa-bell sub-nav-logo"></i></a>
				<a href="#">Account</a>        
			</nav>      
		</header>

		@yield('main-content')

		<section class="link">
			<div class="logos">
				<a href="#"><i class="fab fa-facebook-square fa-2x logo"></i></a>
				<a href="#"><i class="fab fa-instagram fa-2x logo"></i></a>
				<a href="#"><i class="fab fa-twitter fa-2x logo"></i></a>
				<a href="#"><i class="fab fa-youtube fa-2x logo"></i></a>
			</div>
			<div class="sub-links">
				<ul>
					<li><a href="#">Audio and Subtitles</a></li>
					<li><a href="#">Audio Description</a></li>
					<li><a href="#">Help Center</a></li>
					<li><a href="#">Gift Cards</a></li>
					<li><a href="#">Media Center</a></li>
					<li><a href="#">Investor Relations</a></li>
					<li><a href="#">Jobs</a></li>
					<li><a href="#">Terms of Use</a></li>
					<li><a href="#">Privacy</a></li>
					<li><a href="#">Legal Notices</a></li>
					<li><a href="#">Corporate Information</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
			</div>
		</section>

		<footer>
			<p>&copy 1997-2018 Netflix, Inc.</p>
			<p>C232</p>
		</footer>
	</div>
</body>
</html>


