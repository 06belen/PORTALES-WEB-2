<?php

namespace Dao\GeneratorBono;

use Dao\Table;

class GeneratorBono extends Table
{
    public static function getDescription(String $tableName)
    {
        $sql = "DESCRIBE $tableName";
        return self::obtenerRegistros($sql, []);
    }
    public static function getTables()
    {
        $sql = "SHOW TABLES";
        return self::obtenerRegistros($sql, []);
    }
}
