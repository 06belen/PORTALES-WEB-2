<?php

namespace Controllers\GeneratorBono;

class GeneratorBonoHelper
{
    private $keyColumns = [];
    private $columns = [];
    private $table = "";
    private $noKeyColumns = [];
    public function __construct($columns, $table)
    {
        $this->columns = $columns;
        $this->table = $table;
        $this->setKeyColumns();
    }
    private function setKeyColumns()
    {
        foreach ($this->columns as column) {
            if ($column["Key"] == "PRI") {
                $this->keyColumns[] = $column;
            } else {
                $this->noKeyColumns[] = $column;
            }
        }
    }
    public function getDaoPhpCode()
    {
        $codeBuffer = [];
        $codeBuffer[] = "<?php>";
        $codeBuffer[] = "namespace Dao;";
        $codeBuffer[] = "";
        $codeBuffer[] = "use Dao\Table;";
        $codeBuffer[] = "";
        $codeBuffer[] = "class " . ucfirst($this->table) . " extends Table";
        $codeBuffer[] = "{";
        $codeBuffer[] = "    public static function getAll()";
        $codeBuffer[] = "    {";
        $codeBuffer[] = "        return self::obtenerRegistros\SELECT * FROM " . $this->table . "\", []);";
        $codeBuffer[] = "    }";
        $codeBuffer[] = "}";
        return implode("\n", $codeBuffer);
    }
}
