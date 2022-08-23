<?php

namespace App\Model;

require_once __DIR__ . '/../../config/connection.php';
require_once __DIR__ . '/../traits/crud.php';
use App\Config\Connection as Connection;
use READ;

class Database extends Connection
{

	use READ;


	//public $test_data = $this->test_data;

	// public $link;
	// public $error;

	// public function __construct()
	// {
	// 	$this->connectDB();
	// }

	// private function connectDB()
	// {

	// 	if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
	// 		echo 'We don\'t have mysqli!!!';
	// 	} else {
	// 		echo 'Phew we have it!';
	// 	}

	// 	$this->link = new \mysqli($this->host, $this->user, $this->pass, $this->dbname);

	// 	print_r($this->link);

	// 	if (!$this->link) {
	// 		$this->error = "Connection fail" . $this->link->connect_error;
	// 		return false;
	// 	}
	// }

	// // Select or Read data

	// public function select($query)
	// {
	// 	$result = $this->link->query($query) or die($this->link->error . __LINE__);
	// 	if ($result->num_rows > 0) {
	// 		return $result;
	// 	} else {
	// 		return false;
	// 	}
	// }

	// // Insert data
	// public function insert($query)
	// {
	// 	$insert_row = $this->link->query($query) or die($this->link->error . __LINE__);
	// 	if ($insert_row) {
	// 		return $insert_row;
	// 	} else {
	// 		return FALSE;
	// 	}
	// }

	// // Update data
	// public function update($query)
	// {
	// 	$update_row = $this->link->query($query) or die($this->link->error . __LINE__);
	// 	if ($update_row) {
	// 		return $update_row;
	// 	} else {
	// 		return FALSE;
	// 	}
	// }

	// // Delete data
	// public function delete($query)
	// {
	// 	$delete_row = $this->link->query($query) or die($this->link->error . __LINE__);
	// 	if ($delete_row) {
	// 		return $delete_row;
	// 	} else {
	// 		return FALSE;
	// 	}
	// }
}

$data_check = new Database();

$result= $data_check->select("SELECT * FROM nm_event_up WHERE status = 1 ORDER BY eve_time ASC limit 3");

var_dump($result);

