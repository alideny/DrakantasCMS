<?php
class Encryption_model extends CI_Model {
	public function __construct()
	{
	}
	public function sha_password($user,$pass){
					$user = strtoupper($user);
					$pass = strtoupper($pass);
					return SHA1($user.':'.$pass);
				}
}