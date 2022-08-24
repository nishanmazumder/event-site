<?php

namespace App\Trait;

/*
|--------------------------------------------------------------------------
| Read/Select data
|--------------------------------------------------------------------------
*/

trait READ
{
    public function select(string $query)
    {
        try {
            $this->connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $query = $this->connect->prepare($query);
            $query->execute();
        } catch (\PDOException $err) {
            return 'Error:' . $query . ' ' . $err->getMessage();
        }
    }
}

//  Without PDO
trait READ_DATA
{
    public function select($query)
    {
        $result = $this->connect->query($query) or die($this->connect->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
}


/*
|--------------------------------------------------------------------------
| Insert data
|--------------------------------------------------------------------------
*/

trait CREATE
{
    public function insert($query)
    {
        try {
            $this->connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $query = $this->connect->prepare($query);
            $query->execute();

            // return $this->connect->lastInsertId() . " Data Inserted!";
        } catch (\PDOException $err) {
            return "Error:" . $query . " " . $err->getMessage();
        }
    }
}

//  Without PDO
trait CREATE_DATA
{
    public function insert($query)
    {
        $insert_row = $this->connect->query($query) or die($this->connect->error . __LINE__);
        if ($insert_row) {
            return $insert_row;
        } else {
            return FALSE;
        }
    }
}

/*
|--------------------------------------------------------------------------
| Update data
|--------------------------------------------------------------------------
*/
trait UPDATE
{
    public function update($query)
    {
        try {
            $this->connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $query = $this->connect->prepare($query);
            $query->execute();

            //return $query->rowCount(). " Data Updated!";
        } catch (\PDOException $err) {
            return "Error:" . $query . " " . $err->getMessage();
        }
    }
}

//  Without PDO
trait UPDATE_DATA
{
    public function update($query)
    {
        $update_row = $this->connect->query($query) or die($this->connect->error . __LINE__);
        if ($update_row) {
            return $update_row;
        } else {
            return FALSE;
        }
    }
}



/*
|--------------------------------------------------------------------------
| Delete data
|--------------------------------------------------------------------------
*/

/**
 *
 */
trait DELETE
{
    public function delete($query)
    {
        try {
            $this->connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $query = $this->connect->prepare($query);
            $query->execute();

            // return $query->rowCount()." Data Deleted!";
        } catch (\PDOException $err) {
            return "Error:" . $query . " " . $err->getMessage();
        }
    }
}
//  Without PDO
trait DELETE_DATA
{
    public function delete($query)
    {
        $delete_row = $this->connect->query($query) or die($this->connect->error . __LINE__);
        if ($delete_row) {
            return $delete_row;
        } else {
            return FALSE;
        }
    }
}

/*
|--------------------------------------------------------------------------
| DEBUG
|--------------------------------------------------------------------------
|
| Query debug note
|
*/

/////// Select
//Get Result
// $result = $query->fetchAll(\PDO::FETCH_OBJ);

// if ($query->rowCount() > 0) {
//     return $result;
// } else {
//     return "No Data found!";
// }


/////// Create
// if ($this->connect->lastInsertId()) {
//     return "Data Inserted!";
// } else {
//     return "Data Not Inserted!";
// }
/////// Update
// $result = $query->fetch(\PDO::FETCH_OBJ);

// if ($query->rowCount() > 0) {
//     return $result;
// } else {
//     return "Data Not Updated!";
// }

/////// Delete
// if ($query->rowCount() > 0) {
//     return $query->rowCount()." Data Deleted!";
// }