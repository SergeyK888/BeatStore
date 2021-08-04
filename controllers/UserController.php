<?php
include_once ROOT.'/models/User.php';

class UserController
{

	/*
	*Метод регистрации
	*/
	public function actionRegister()
	{
		$title = 'Register User';

		if (isset($_POST['onSubmit'])) {

			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$repeatPassword = $_POST['r_password'];
			$whoIs = $_POST['whoIs'];

			$errors = [];
			$htmlError = '
				<div class="alert alert-danger mt-2 mb-2" role="alert">
				  #
				</div>
			';
			$htmlSuccessful = '
				<div class="alert alert-success mt-2 mb-2" role="alert">
				  #
				</div>
			';
			

			if (!User::checkName($name)) {
				$errors[] = '<p class="text-primary">Invalid name</p> The name must be at least 2 characters and no more than 50';
			}

			if (!User::checkPassword($password, $repeatPassword)) {
				$errors[] = '<p class="text-primary">Invalid password</p> The password must contain at least 8 characters and no more than 50, and the password must be the same with the repeated password';
			}

			if (!User::checkMail($email)) {
				$errors[] = '<p class="text-primary">Invalid email</p> The email address must contain the @ symbol, as well as the domain name. Example: example@domain.demo';
			}

			if (!User::checkWhoIs($whoIs)) {
				$errors[] = '<p class="text-primary">Invalid fields "Who you are?"</p> Choose who you are, an artist or a beatmaker';
			}

			if (isset($_POST['checkRule'])) {
				$checkRule = $_POST['checkRule'];
				if (!User::checkRule($checkRule)) {
					$errors[] = '<p class="text-primary">Invalid checbox</p> accept the terms of the agreement';
				}
			}else{
				$errors[] = '<p class="text-primary">Invalid checbox</p> accept the terms of the agreement';
			}

			if (!User::checkEmailExists($email)) {
				$errors[] = '<p class="text-primary">Invalid email</p> The mail should not be used more than 1 time, try another mail';
			}

			if (empty($errors)) {
				$result = User::register($name, $password, $email, $whoIs);
			}
		}
		
		require_once(ROOT.'/views/register/index.php');

		return true;
	}

	public function actionLogin()
	{
		$title = 'Login User';

		if (isset($_POST['onLogin'])) {

			$email = $_POST['email'];
			$password = $_POST['password'];

			$errors = [];
			$htmlError = '
				<div class="alert alert-danger mt-2 mb-2" role="alert">
				  #
				</div>
			';		

			if (!User::checkMail($email)) {
				$errors[] = '<p class="text-primary">Invalid email</p> The email address must contain the @ symbol, as well as the domain name. Example: example@domain.demo';
			}

			if (!User::checkOnlyPassword($password)) {
				$errors[] = '<p class="text-primary">Invalid password</p> The password must contain at least 8 characters and no more than 50';
			}

			$user = User::checkUserData($password, $email);


			if ($user == false) {
				$errors[] = '<p class="text-primary">Invalid data</p> Invalid email or password';	
			}else{
				User::auth($user);
				$url = '/';
				header('Location: '.$url);
			}
		}
		
		require_once(ROOT.'/views/login/index.php');

		return true;
	}

}