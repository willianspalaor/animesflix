<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
	<link rel="icon" href="/img/icon.png">
	<link rel="stylesheet" href="/css/layout/admin.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="/js/layout/admin.js"></script>

	@yield('script')

</head>
<body>

	@section('navbar')
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="/admin">Inicio</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
				<a class="nav-link" href="/admin/category">Categorias <span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>
	@show

	<div class='container'>
   		@yield('body')
	</div>

    <div class='container'>
       @yield('modal')
    </div>

</body>
</html>


