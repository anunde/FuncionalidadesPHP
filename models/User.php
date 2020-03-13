<?php

class User {

	private $id;
	private $role;
	private $name;
	private $surname;
	private $nick;
	private $email;
	private $password;
	private $description;
	private $image;
	private $created_at;
	private $updated_at;
	private $remember_token;
	private $db;

	public function __construct() {
		$this->db = database::connect();
	}

	public function getId() {
		return $this->id;
	}

	public function getRole() {
		return $this->role;
	}

	public function getName() {
		return $this->name;
	}

	public function getSurname() {
		return $this->surname;
	}

	public function getNick() {
		return $this->nick;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getPassword() {
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}

	public function getDescription() {
		return $this->description;
	}

	public function getImage() {
		return $this->image;
	}

	public function getCreated_at() {
		return $this->created_at;
	}

	public function getUpdated_at() {
		return $this->updated_at;
	}

	public function getRemember_token() {
		return $this->remember_token;
	}

	public function setId($id) {
		$this->id = $id;
 	}

 	public function setRole($role) {
		$this->role = $role;
 	}

 	public function setName($name) {
		$this->name = $this->db->real_escape_string($name);
 	}

 	public function setSurname($surname) {
		$this->surname = $this->db->real_escape_string($surname);
 	}

 	public function setNick($nick) {
		$this->nick = $this->db->real_escape_string($nick);
 	}

 	public function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
 	}

 	public function setPassword($password) {
		$this->password = $this->db->real_escape_string($password);
 	}

 	public function setDescription($description) {
		$this->description = $this->db->real_escape_string($description);
 	}

 	public function setImage($image) {
		$this->image = $image;
 	}

 	public function setCreated_at($created_at) {
		$this->created_at = $created_at;
 	}

 	public function setUpdated_at($updated_at) {
		$this->updated_at = $updated_at;
 	}

 	public function setRemember_token($remember_token) {
		$this->remember_token = $remember_token;
 	}

 	public function save() {
 		$sql = "INSERT INTO users VALUES(null, 'user', '{$this->getName()}', '{$this->getSurname()}', '{$this->getNick()}', '{$this->getEmail()}', '{$this->getPassword()}', null, null, CURDATE(), CURDATE(), null);";
 		$save = $this->db->query($sql);

 		if ($save) {
 			return true;
 		}

 		return false;
 	}

 	public function getAll() {
 		$users = $this->db->query("SELECT * FROM users;");
 		return $users->fetch_object();
 	}
}