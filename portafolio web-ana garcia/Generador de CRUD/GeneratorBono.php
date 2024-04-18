<?php

namespace Controllers\GeneratorBono;

use Controllers\PublicController;
use Views\Renderer;

class GeneratorBono extends PublicController
{

    public function run(): void
    {
        $viewData["tables"] = \Dao\GeneratorBono\GeneratorBono::getTables();
        if ($this->isPostBack()) {
            $table = $_POST["tables"];
            $viewData["columns"] = \Dao\GeneratorBono\GeneratorBono::getDescription($table);
            $gen = new GeneratorBonoHelper($viewData["columns"], $table);
            $viewData["genResult"] = $gen->getDaoPhpCode();
        }
        Renderer::render("generatorbono/generatorbono", $viewData);
    }
}
