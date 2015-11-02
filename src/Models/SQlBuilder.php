<?php
namespace Models;


class SQlBuilder
{
    protected $table;

    protected $select = [];

    protected $leftJoin = [];

    public function __construct($table)
    {
        $this->table = $table;
        $this->select[] = "$table.*";
    }

    public function leftJoin($table, $sender, $reseiver, $colums = [])
    {
        $this->leftJoin[] = "LEFT JOIN $table ON $table.$sender = $this->table.$reseiver";
        
        if(!count($colums)){
            $this->select[] = "$table.*";
        }else{
            foreach($colums as $colum){
                $this->select[] = "$table.$colum as $table\_$colum";
            }
        }

        return $this;
    }

    public function get()
    {
        $query = "SELECT " . implode(" , ", $this->select) . " FROM $this->table ". implode(" ", $this->leftJoin);

        return str_replace("\_", "_", $query);
    }

}