<?php
namespace classes;
use PDO;
class Koneksi {
	private $db_host = 'localhost',
			$db_user = 'root',
			$db_pass = '',
			$db_name = 'koskita';
	protected $db;
	function __construct() {
		$this->db = new PDO("mysql:host=$this->db_host; dbname=$this->db_name", $this->db_user, $this->db_pass);
		return $this;
	}
}
?>