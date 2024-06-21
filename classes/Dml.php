<?php
namespace classes;
use PDO;
include_once "Koneksi.php";
class Dml extends Koneksi {
	private $fields = array();
	private $table;
	private $where;
	private $order;
	private $limit;
	private $data;
	
	public function select() {
		$this->fields = func_get_args();
		return $this;
	}
	public function from_into($table) {
		$this->table = $table;
		return $this;
	}
	public function where($where) {
		$this->where = $where;
		return $this;
	}
	public function order($order) {
		$this->order = $order;
		return $this;
	}
	public function limit($limit) {
		$this->limit = $limit;
		return $this;
	}
	public function get() {
		$query = "SELECT ";
		// jika tidak diisi
		if(empty($this->fields)) {
			$query .= " * ";
		}
		// jika diisi
		$query .= join(', ', $this->fields) . " FROM " . $this->table;
		// jika where digunakan dan ada isinya
		if(!empty($this->where)) {
			$query .= " WHERE " . $this->where;
		}
		// jika order digunakan dan ada isinya
		if(!empty($this->order)) {
			$query .= " ORDER BY " . $this->order;
		}
		// jika limit digunakan dan ada isinya
		if(!empty($this->limit)) {
			$query .= " LIMIT " . $this->limit;
		}
		// siapkan variabel penampung hasil baca tabel
		$hasil = array();
		// mengeksekusi query
		$q = $this->db->prepare($query);
		$q->execute();
		$hasil = $q->fetchAll(PDO::FETCH_ASSOC);
		// kembalikan hasilnya
		return $hasil;
	}
	public function insert($data) {
		$this->data = $data;
		return $this;
	}
	private function getFields($data) {
		$fields = '';
		foreach($data as $k => $d) {
			$fields .= $k . ',';
		}
		$fields = substr($fields, 0, -1);
		return $fields;
	}
	private function getEntries($data) {
		$entries = '';
		foreach($data as $k => $d) {
			$entries .= "'$d',";
		}
		$entries = substr($entries, 0, -1);
		return $entries;
	}
	public function create() {
		$fields = $this->getFields($this->data);
		$entries = $this->getEntries($this->data);
		$query = "INSERT INTO " . $this->table;
		$query .= " ($fields) VALUES ($entries)";
		//eksekusi perintah
		$q = $this->db->prepare($query);
		$q->execute();
	}
	public function updateData($data) {
		$this->data = $data;
		return $this;
	}
	public function set() {
		$ubah = '';
		foreach($this->data as $k => $d) {
			$ubah .= "$k='$d',";
		}
		$ubah = substr($ubah, 0, -1);
		$query = "UPDATE " . $this->table;
		$query .= " SET " . $ubah;
		$query .= " WHERE " . $this->where;
		$q = $this->db->prepare($query);
		$q->execute();
	}
	public function deleteData() {
		return $this;
	}
	public function del() {
		$query = "DELETE FROM " . $this->table;
		$query .= " WHERE " . $this->where;
		$q = $this->db->prepare($query);
		$q->execute();
	}
}
?>

