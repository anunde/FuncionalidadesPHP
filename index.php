<?php

	session_start();
	require_once 'autoload.php';
	require_once 'config/database.php';
	require_once 'config/parametres.php';
	require_once 'helpers/utils.php';
	require_once 'views/layout/header.php';

	if(class_exists('UserController')) {
		$controller = new UserController();

		if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
			$action = $_GET['action'];
			$controller->$action();
		} elseif (!isset($_GET['action'])) {
			$action_default = action_default;
			$controller->$action_default();
		} else {
			Utils::error();
			exit();
		}
	} else {
		Utils::error();
		exit();
	}

	require_once 'views/layout/footer.php';