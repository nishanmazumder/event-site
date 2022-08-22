<?php

namespace App;

include __DIR__."/../config/config.php";

class Database
{
	public $host   = DB_HOST;
	public $user   = DB_USER;
	public $pass   = DB_PASS;
	public $dbname = DB_NAME;


	public $link;
	public $error;

	public function __construct()
	{
		$this->connectDB();
	}

	private function connectDB()
	{

		if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
			echo 'We don\'t have mysqli!!!';
		} else {
			echo 'Phew we have it!';
		}

		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

		print_r($this->link);

		if (!$this->link) {
			$this->error = "Connection fail" . $this->link->connect_error;
			return false;
		}
	}

	// Select or Read data

	public function select($query)
	{
		$result = $this->link->query($query) or die($this->link->error . __LINE__);
		if ($result->num_rows > 0) {
			return $result;
		} else {
			return false;
		}
	}

	// Insert data
	public function insert($query)
	{
		$insert_row = $this->link->query($query) or die($this->link->error . __LINE__);
		if ($insert_row) {
			return $insert_row;
		} else {
			return FALSE;
		}
	}

	// Update data
	public function update($query)
	{
		$update_row = $this->link->query($query) or die($this->link->error . __LINE__);
		if ($update_row) {
			return $update_row;
		} else {
			return FALSE;
		}
	}

	// Delete data
	public function delete($query)
	{
		$delete_row = $this->link->query($query) or die($this->link->error . __LINE__);
		if ($delete_row) {
			return $delete_row;
		} else {
			return FALSE;
		}
	}
}
