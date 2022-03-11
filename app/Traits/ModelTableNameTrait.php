<?php

namespace App\Traits;

trait ModelTableNameTrait
{
//    public static function __callStatic($method) {
////        dd(static::class);
//        return static::class->$method();
//    }

    public static function tableName() {
        return with(new static)->getTable();
    }
}
