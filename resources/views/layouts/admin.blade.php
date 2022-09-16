<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/img/icon.png">
	
	<!--<script src="/external/font-awesome/5.1.0/js/all.js"></script>-->
	<!--<link rel="stylesheet" href="/external/font-awesome/4.7.0/css/font-awesome.min.css">-->
	<link rel="stylesheet" href="/external/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="/external/data-table/1.12.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="/external/select2/4.1.0/css/select2.min.css">

	<link rel="stylesheet" href="/css/layout/admin.css">
	<script src="/external/jquery/jquery-3.5.1.min.js"></script>
	<script src="/external/jquery/popper.min.js"></script>
	<script src="/external/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="/external/data-table/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="/external/select2/4.1.0/js/select2.min.js"></script>
	<script src="/js/layout/admin.js"></script>
	<script src="/js/admin/helper.js"></script>

	@yield('script')

</head>
<body>

	@section('navbar')
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="/admin">Inicio</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"></button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="/admin/category">Categorias</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/admin/genre">Gêneros</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/admin/show">Shows</a>
				</li>
			</ul>
		</div>
	</nav>
	@show

	<div class='container-fluid'>
		@yield('body')
	</div>

    <div class='container-fluid'>
       	@yield('modal')
    </div>

</body>
</html>


