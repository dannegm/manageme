<?php
class User
{
	private $_uid;

	private $_db_server = DB_SERVER;
	private $_db_user = DB_USER;
	private $_db_pass = DB_PASS;
	private $_db_bdata = DB_BASEDATA;
	private $_tb_users = TB_USERS;

	private $_mysqli;
	private $_error = 'Error no identificado';

	public function __construct () {
		$mysqli = new mysqli($this->_db_server, $this->_db_user, $this->_db_pass, $this->_db_bdata);
		if ( mysqli_connect_errno () ) {
			$this->_error = 'No se pudo conectar a la base de datos';
			return false;
		}else{
			$this->_mysqli = $mysqli;
			return true;
		}
	}

	public function error () {
		return $this->_error;
	}

	public function register ($data) {
		$uid = genKeyUid('uid');

		$username = $data['username'];
			$username = delespecialchars($username);
		$password = $data['password'];
			$password = delespecialchars($password);
			$password = md5($password);

		$name = $data['name'];
		$email = $data['email'];

		$date = date("w j-m-Y g:i:s:a");
		$rol = 'admin';
		$status = 'active';
		$login = 'yep';
		$avatar = 'avatarPlaceholder.png';

		$token = genToken("{$uid}|{$username}|{$password}");

		$query = "INSERT INTO `{$this->_tb_users}` (`uid`, `username`, `password`, `name`, `email`, `date`, `rol`, `status`, `login`, `token`, `avatar`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$conn = $this->_mysqli;
		$ins = $conn->prepare($query);
		$ins->bind_param( 'sssssssssss', $uid, $username, $password, $name, $email, $date, $rol, $status, $login, $token, $avatar);
		$insert = $ins->execute();

		if ( !$insert ) {
			$this->_error = "No se pudo registrar el usuario {$username}";
			return false;
		} else {
			return true;
		}
	}

	private function consult ($what, $who) {
		$query = "SELECT `{$what}` FROM `{$this->_tb_users}` WHERE `username` = '{$who}'";
		$conn = $this->_mysqli;

		$get_data = $conn->query($query);
		$result = $get_data->fetch_assoc();
		return $result[$what];
	}

	private function update ($who, $what, $newVal) {
		$conexion = $this->_mysqli;
		$up_query = "UPDATE `{$this->_tb_users}` SET `{$what}` = ? WHERE `username` = '{$who}'";
		$up = $conexion->prepare($up_query);

		$up->bind_param ('s', $newVal);
		$upd = $up->execute();

		if ( !$upd ) {
			$this->_error = "No se pudo actualizar éste dato";
			return false;
		}else{
			return true;
		}
	}

	public function getInfo ($user) {
		$conn = $this->_mysqli;
		$query = "SELECT * FROM `{$this->_tb_users}` WHERE `username` = '{$user}'";
		$get_data = $conn->query($query);
		$result = $get_data->fetch_assoc();
		$res = Array(
			'index' => $result['id'],
			'uid' => $result['uid'],
			'username' => $result['username'],
			'name' => $result['name'],
			'email' => $result['email'],
			'rol' => $result['rol'],
			'bio' => $result['bio'],
			'avatar' => $result['avatar'],
			'date' => $result['date']
		);
		return $res;
	}

	//!!! Funcionalidad extraña, revisar para 6.1
	private function exist ($who) {
		$conn = $this->_mysqli;
		$sql = "SELECT * FROM `{$this->_tb_users}` WHERE `username` = '{$who}'";
		$conn->query($sql);
		$n = $conn->affected_rows;
		if ($n > 0) {
			return false;
		} else {
			return true;
		}
	}

	public function logout ($user) {
		$uid = $this->consult('uid', $user);
		$token = genToken("{$uid}|{$user}|logout");
		$this->update($user, 'login', 'nope');
		$this->update($user, 'token', $token);

		setcookie('uid', '', time() - 3600, '/');
		setcookie('user', '', time() - 3600, '/');

		if (isset($_COOKIE['token'])) {
			setcookie('token', '', time() - 3600, '/');
		} else {
			session_start();
			unset($_SESSION['token']);
		}
		return true;
	}

	public function login ($user) {
		if (is_array($user)) {
			$keep = $user['keep'];
			$pass = $user['password'];
				$pass = md5($pass);
			$user = $user['username'];

			if (!$this->exist($user)) {
				$pwd = $this->consult('password', $user);
				if ($pass == $pwd) {
					$uid = $this->consult('uid', $user);
					$token = genToken("{$uid}|{$user}|{$pass}");

					$this->update($user, 'login', 'yep');
					$this->update($user, 'token', $token);

					setcookie('uid', $uid, time() + 604800, '/');
					setcookie('user', $user, time() + 604800, '/');

					if ($keep == 'keep') {
						setcookie('token', $token, time() + 604800, '/');
					} else {
						session_start();
						$_SESSION['token'] = $token;
					}

					return true;
				} else {
					$this->_error = 'La contraseña es incorrecta';
					return false;
				}
			} else {
				$this->_error = "el usuario {$user} no existe";
				return false;
			}
		} else {
			if (!$this->exist($user)) {
				$token = $this->consult('token', $user);

				$uid = $this->consult('uid', $user);
				$pass = $this->consult('password', $user);
				$newToken = genToken("{$uid}|{$user}|{$pass}");

				if (isset($_COOKIE['token'])) {
					if ($_COOKIE['token'] == $token) {

						$tk = base64_decode($token);
							$tk = explode('|', $tk);
						$ntk = base64_decode($newToken);
							$ntk = explode('|', $ntk);

						if (
							($tk[0] == $ntk[0]) && //uid
							($tk[1] == $ntk[1]) && //user
							($tk[2] == $ntk[2]) && //pass
						//	($tk[3] == $ntk[3]) && //date
							($tk[4] == $ntk[4]) && //ip
							($tk[5] == $ntk[5]) && //type
							($tk[6] == $ntk[6]) && //os
							($tk[7] == $ntk[7]) && //nav

							($tk[0] == $uid) && // UID actual
							($tk[1] == $user) // usuario actual
						) {

							$this->update($user, 'token', $newToken);
							setcookie('token', $newToken, time() + 604800, '/');
							return true;

						} else {
							$this->logout($user);
							$this->_error = 'invalid token';
							return false;
						}
					} else {
						$this->logout($user);
						$this->_error = 'invalid token';
						return false;
					}
				} else {
					session_start();
					if ($_SESSION['token'] == $token) {
						$this->update($user, 'token', $newToken);
						$_SESSION['token'] = $newToken;
						return true;
					} else {
						$this->logout($user);
						$this->_error = 'invalid token';
						return false;
					}
				}
			} else {
				$this->_error = "el usuario {$user} no existe";
				return false;
			}
		}
	}
}