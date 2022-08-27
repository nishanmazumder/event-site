<?php

namespace App\Model;

/*
|--------------------------------------------------------------------------
| Load Auto Loader
|--------------------------------------------------------------------------
|
| Composer
|
*/

if (file_exists(__DIR__ . "/../../vendor/autoload.php")) {
	require_once __DIR__ . "/../../vendor/autoload.php";
} else {
	echo "Autoloader not found!";
}

/*
|--------------------------------------------------------------------------
| Connection & Traits
|--------------------------------------------------------------------------
|
| Load connection and trait files
|
*/

// if (file_exists(__DIR__ . '/../traits/CRUD.php')) {
// 	require_once __DIR__ . '/../traits/CRUD.php';
// } else {
// 	echo "Trait not found!";
// }

// require_once __DIR__."/../config/connection.php";
// require_once __DIR__."/Connect.php";

/*
|--------------------------------------------------------------------------
| Load Classes
|--------------------------------------------------------------------------
|
| Use require calsses
|
*/

use Config\Connection;
use App\Trait\CREATE;
use App\Trait\DELETE;
use App\Trait\READ;
use App\Trait\UPDATE;

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

	/*
	|--------------------------------------------------------------------------
	| CREATE Data
	|--------------------------------------------------------------------------
	*/
	use CREATE;

	/*
	|--------------------------------------------------------------------------
	| UPDATE Data
	|--------------------------------------------------------------------------
	*/
	use UPDATE;

	/*
	|--------------------------------------------------------------------------
	| DELETE Data
	|--------------------------------------------------------------------------
	*/
	use DELETE;
}

/*
|--------------------------------------------------------------------------
| DEBUG
|--------------------------------------------------------------------------
|
| CRUD debug testing...
|
*/

$data_check = new Database();

// select
// $result= $data_check->select("SELECT * FROM nm_faq");
$result = $data_check->select("SELECT * FROM nm_faq WHERE id = 6");

// insert
// $result = $data_check->insert("INSERT INTO nm_faq (ques, ans) VALUES ('Question', 'Answer')");

// Update
// $result = $data_check->update("UPDATE nm_faq SET ques = 'Question Update', ans = 'Answer Update' WHERE id = '10'");

// Delete
//$result = $data_check->delete("DELETE FROM nm_faq WHERE id = '8'");

var_dump($result);


// $rand_data = new Format();

// echo $rand_data->random_token(10);
