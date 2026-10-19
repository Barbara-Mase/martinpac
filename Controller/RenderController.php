<?php

class RenderController extends AbstractController
{
    public function home() : void {

        $errors = $_SESSION['errors'] ?? [];

        $this->render('home', [
            "errors" => $errors,
        ]);
    }
    public function contact() : void {

        $errors = $_SESSION['errors'] ?? [];

        $this->render('contact', [
            "errors" => $errors,
        ]);
    }
}

