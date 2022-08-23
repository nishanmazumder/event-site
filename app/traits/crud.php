<?php

trait READ{
    public function select($query)
    {
        try {
            $query = $this->connect->prepare($query);
            $query->execute();
            $result = $query->fetchAll(\PDO::FETCH_OBJ);

            if ($query->rowCount() > 0) {
                return $result;
            } else {
                return "No Data found!";
            }
        } catch (\PDOException $err) {
            return 'Error:' . $query . ' ' . $err->getMessage();
        }
    }
}