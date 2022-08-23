<?php

namespace App\Model;

/*
|--------------------------------------------------------------------------
| Connection & Traits
|--------------------------------------------------------------------------
|
| Load connection and trait files
|
*/

if (file_exists(require_once __DIR__ . '/../../config/connection.php')) {
    require_once __DIR__ . '/../../config/connection.php';
} else {
    echo "Connection not found!";
}

if (file_exists(require_once __DIR__ . '/../traits/crud.php')) {
    require_once __DIR__ . '/../traits/crud.php';
} else {
    echo "Connection not found!";
}

/*
|--------------------------------------------------------------------------
| Classes
|--------------------------------------------------------------------------
|
| Use require calsses
|
*/

use App\Config\Connection as Connection;
use App\Trait\READ;

/*
|--------------------------------------------------------------------------
| Database Query
|--------------------------------------------------------------------------
|
| Database query for CRUD (query loded from traits)
|
*/

class Database extends Connection
{

	/*
	|--------------------------------------------------------------------------
	| Read Data
	|--------------------------------------------------------------------------
	*/
	use READ;

}

$data_check = new Database();

$result= $data_check->select("SELECT * FROM nm_event_up WHERE status = 1 ORDER BY eve_time ASC limit 3");

var_dump($result);

