<?php

class Router {

    public function __construct() {
        $this->rc = new RenderController();
    }

    public function handleRequest(array $get) {

        if(isset($_GET['route'])) {
            if($get['route'] === "home") {
                $this->rc->home();
            }
            elseif($get['route'] === "contact") {
                $this->rc->contact();
            }
            else {
            $_SESSION['errors']['invalidRoute'] = "This route does not exist";
            $this->rc->home();
            }
        }
        else {
            $this->rc->home();
        }
    }

}
