<?php
/**
 * Created by PhpStorm.
 * User: pedko
 * Date: 29.10.15
 * Time: 20:02
 */

namespace Models;


class Adver extends Common
{
    protected $table = "adver";

    public function get()
    {
        $builder = $this->createSqlBuilder()
            ->leftJoin("make", "id", "make_id", ["name"])
            ->leftJoin("model", "id", "model_id", ["name"])
            ->get()
        ;

        return $this->fetchAll($builder);
    }

}