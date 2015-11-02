<?php

namespace Models;

use Exception;
use mysqli;

/**
 * Created by PhpStorm.
 * User: pedko
 * Date: 29.10.15
 * Time: 19:55
 */
class Common
{
    /**
     * @var mysqli
     */
    protected $connect;

    protected $table = "";

    protected $builder;

    public $id;

    public function __construct()
    {
        $this->connect();
    }

    /**
     *
     */
    protected function connect()
    {
        $this->connect = new mysqli('localhost', 'login', 'password', 'cars');

        if (mysqli_connect_errno()) {
            throw new Exception("Подключение невозможно: " . mysqli_connect_error());
        }
    }

    protected function fetch($query)
    {
        return mysqli_fetch_assoc(mysqli_query($this->connect, $query));
    }

    protected function fetchAll($query)
    {
        return mysqli_fetch_all(mysqli_query($this->connect, $query));
    }

    /**
     *
     */
    protected function close()
    {
        $this->connect->close();
    }

    protected function createSqlBuilder()
    {
        $this->builder = new SQlBuilder($this->table);

        return $this->builder;
    }


    public function findAll()
    {
        return $this->fetchAll("SELECT * FROM $this->table");
    }

    public function find($id)
    {
        $result = $this->fetch("SELECT * FROM $this->table WHERE $this->table.id = $id");
        $this->id = $result["id"];

        return $result;
    }

    public function insertData($column, $data)
    {
        $result = "INSERT INTO $this->table.$column VALUES $this->table.$data";

        return $result;
    }

    public function deleteData($column, $id)
    {
        $result = "DELETE FROM $this->table.$column WHERE $this->table.id = $id";
        mysqli_query($result);

        return $result;
    }


}