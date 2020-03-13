<?php

class Utils {
	public static function error() {
		echo "<h1>La página que buscas no existe</h1>";
	}
	//Borrar sesiones
	public static function deleteSession($session) {
		if (isset($_SESSION[$session])) {
			$_SESSION[$session] = null;
		}

		return $session;
	}

	//Generar token
	public static function generate() {
		return $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
	}

	//Verificar token
	public static function check($token) {
		if (isset($_SESSION['token']) && $token === $_SESSION['token']) {
			unset($_SESSION['token']);
			return true;
		}

		return false;
	}
}