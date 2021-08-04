<!-- Header html страницы с CSS файлами и шапкой самого сайта --> 
<!doctype html>
<html lang="ru">
<head>
    <!-- Подключение мета-тега и кодировки -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Подключение библиотеки бутстрап CSS -->

    <link rel="stylesheet" href="/css/bootstrap.css">

    <title><?php echo $title; ?></title>
</head>
<body>

<? var_dump($_SESSION['login_user']); ?>

<div class="p-5 pb-0 pr-0 bg-danger">
	<a style="text-decoration: none;" href="/"><h1 class="text-light">BeatStore</h1></a>
	<?php
	if (isset($_SESSION['login_user'])) {
		?>
		<div class="d-flex justify-content-end">
		  <nav class="navbar navbar-light bg-danger justify-content-around p-2">
		    <p><? echo $_SESSION['login_user']->name; ?></p>
		  </nav>
		</div>
		<?
	}else if(empty($_SESSION['login_user'])){
		if (!empty($_SERVER['REQUEST_URI'])) {
			if(trim($_SERVER['REQUEST_URI'], '/') == 'user/register'){
				?>
				<div class="d-flex justify-content-end">
				  <nav class="navbar navbar-light bg-danger justify-content-around p-2">
				    <a href="/user/login" class="btn btn-outline-warning m-1" role="button" aria-disabled="true">Login</a>
				  </nav>
				</div>
				<?
			}else if (trim($_SERVER['REQUEST_URI'], '/') == 'user/login') {
				?>
				<div class="d-flex justify-content-end">
				  <nav class="navbar navbar-light bg-danger justify-content-around p-2">
				    <a href="/user/register" class="btn btn-outline-info m-1" role="button" aria-disabled="true">Register</a>
				  </nav>
				</div>
				<?
			}else{
				?>
				<div class="d-flex justify-content-end">
				  <nav class="navbar navbar-light bg-danger justify-content-around p-2">
				    <a href="/user/register" class="btn btn-outline-info m-1" role="button" aria-disabled="true">Register</a>
				    <a href="/user/login" class="btn btn-outline-warning m-1" role="button" aria-disabled="true">Login</a>
				  </nav>
				</div>
				<?
			}
		}
	}
	?>
</div>


<div class="container-fluid">