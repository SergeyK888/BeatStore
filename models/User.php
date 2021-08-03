<?php

class User
{

	/*
	*Регистрация ппользователя в БД
	*/
	public static function register($name, $password, $email, $whois)
	{
		$passwordHash = password_hash($password, PASSWORD_BCRYPT);

		$db = Db::getConnection();

		$sql = 'INSERT INTO `users` (name, password, email, whois) VALUES (:name, :password, :email, :whois)';

		$result = $db->prepare($sql);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':password', $passwordHash, PDO::PARAM_STR);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':whois', $whois, PDO::PARAM_STR);

		return $result->execute();
	}

	/*
	*Проверка валидации Email
	*/
	public static function checkMail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
	}

	/*
	*Проверка валидации Пароля, а также проверка на правильность повторного пароля
	*/
	public static function checkPassword($password, $repeatPassword)
	{
		if (strlen($password) >= 8 and strlen($password) <= 50) {
			if ($password == $repeatPassword) {
				return true;
			}
			return false;
		}
		return false;
	}

	/*
	*Проверка валидации Имени
	*/
	public static function checkName($name)
	{
		if (strlen($name) >= 2 and strlen($name) <= 50) {
			return true;
		}
		return false;
	}

	/*
	*Проверка валидации выбранного навыка
	*/
	public static function checkWhoIs($status)
	{
		if ($status == 'Bitmaker' or $status == 'Artist') {
			return true;
		}
		return false;
	}

	/*
	*Проверка валидации чекбокса с правилами
	*/
	public static function checkRule($status)
	{
		if ($status == 'on') {
			return true;
		}
		return false;
	}

	/*
	*Проверка на существование email в БД
	*/
	public static function checkEmailExists($email)
	{
		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM `users` WHERE `email` = :email';

		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->execute();

		if ($result->fetchColumn()) {
			return false;
		}

		return true;
	}

}