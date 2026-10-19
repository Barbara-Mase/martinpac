<?php

class Router {

    private RenderController $rc;
    private Mailer $mailer;
    public function __construct() {
        $this->rc = new RenderController();
        $this->mailer = new Mailer();
    }

    public function handleRequest(array $get) : void{

        if(isset($_GET['route'])) {
            if($get['route'] === "home") {
                $this->rc->home();
            }
            elseif($get['route'] === "contact") {
                $this->rc->contact();
            } elseif($get['route'] === "mailer") {
                $this->mailer->mail();
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
