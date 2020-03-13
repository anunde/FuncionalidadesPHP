<?php

require_once 'models/User.php';

class UserController {
	public function login() {
		require_once 'views/user/login.php';
	}

	public function register() {
		require_once 'views/user/register.php';
	}

	public function save() {

		//Verificamos que llegan datos por POST

		if (isset($_POST)) {

			//Verificamos que llega información desde todos los campos

			$token = isset($_POST['token']) ? $_POST['token'] : false;
			$name = isset($_POST['name']) ? $_POST['name'] : false;
			$surname = isset($_POST['surname']) ? $_POST['surname'] : false;
			$nick = isset($_POST['nick']) ? $_POST['nick'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			$password_confirm = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : false;


			$errores = array();

			if (empty($name)) {
				$_SESSION['name'] = "El campo nombre no puede estar vacio";
				$error = true;
			} elseif (strlen($name) >= 15 ) {
				$_SESSION['name'] = "El nombre no puede superar los 15 caracteres";
				$error = true;
			} elseif (preg_match("/[0-9]/", $name)) {
				$_SESSION['name'] = "El nombre solo puede contener letras";
				$error = true;
			} elseif (empty($surname)) {
				$_SESSION['surname'] = "El campo apellido no puede estar vacio";
				$error = true;
			} elseif (strlen($surname) >= 30 ) {
				$_SESSION['surname'] = "Los apellidos no pueden superar los 30 caracteres";
				$error = true;
			} elseif (preg_match("/[0-9]/", $surname)) {
				$_SESSION['surname'] = "Los apellidos solo pueden contener letras";
				$error = true;
			} elseif (empty($nick)) {
				$_SESSION['nick'] = "El campo alias no puede estar vacio";
				$error = true;
			} elseif (strlen($nick) >= 15 ) {
				$_SESSION['nick'] = "El alias no puede superar los 15 caracteres";
				$error = true;
			} elseif ($nick != str_replace(' ', '', $nick)) {
				$_SESSION['nick'] = "El alias no puede contener espacios";
				$error = true;
			} elseif (empty($email)) {
				$_SESSION['email'] = "Debes introducir un correo electrónico";
				$error = true;
			} elseif (!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email)) {
				$_SESSION['email'] = "Debes introducir un correo electrónico válido";
				$error = true;
			} elseif (empty($password)) {
				$_SESSION['password'] = "Debes introducir una contraseña";
				$error = true;
			} elseif (strlen($password) <= 8) {
				$_SESSION['password'] = "La contraseña debe tener al menos 8 caracteres";
				$error = true;
			} elseif (!preg_match('`[A-Z]`', $password)) {
				$_SESSION['password'] = "La contraseña debe contener al menos una letra mayúscula";
				$error = true;
			} elseif (!preg_match('`[0-9]`', $password)) {
				$_SESSION['password'] = "La contraseña debe contener al menos un número del 0 al 9";
				$error = true;
			} elseif (empty($password_confirm)) {
				$_SESSION['password_confirm'] = "Debes introducir la contraseña dos veces";
				$error = true;
			} elseif ($password != $password_confirm) {
				$_SESSION['password_confirm'] = "Las contraseñas no coinciden";
				$error = true;
			}

			if ($error != true) {
				if (Utils::check($token)) {
						$user = new User();
						$user->setName($name);
						$user->setSurname($surname);
						$user->setNick($nick);
						$user->setEmail($email);
						$user->setPassword($password);

						$save = $user->save();

						if ($save) {
							$_SESSION['register'] = 'complete';
							header("Location: ".base_url."?action=login");
						} else {
							$_SESSION['register'] = 'failed';
							header("Location: ".base_url."?action=register");
						}

				} else {
					$_SESSION['register'] = 'failed';
					header("Location: ".base_url."?action=register");
				}
			} else {
				$_SESSION['register'] = 'failed';
				header("Location: ".base_url."?action=register");
			}
		}
	}
}