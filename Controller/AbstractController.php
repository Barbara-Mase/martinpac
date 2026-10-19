<?php

class AbstractController
{

    public function __construct() {

    }

    protected function render(string $template, array $data) : void
    {
        require "templates/layout.phtml";
    }
}
