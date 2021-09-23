<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Model_Login extends CI_Model
{
	public function cari_user($username, $password)
	{
		$mysql="SELECT * FROM user WHERE (username='$username' OR email='$username') AND password='$password'";
		$res = $this->db->query($mysql);
		return $res;
	}
}

?>