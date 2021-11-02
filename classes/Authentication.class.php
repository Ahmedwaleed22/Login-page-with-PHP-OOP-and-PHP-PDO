<?php

class Authentication extends Dbh {
	public function login($username, $password) {
		$sql = "SELECT username, password FROM users WHERE username = ? LIMIT 1";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute(array($username));
		$row = $stmt->fetch();

		if (password_verify($password, $row['password'])) {
			return json_encode([
				'auth' => true,
				'username' => $row['username']
			]);
		}

		return json_encode([
			'auth' => false
		]);
	}
}