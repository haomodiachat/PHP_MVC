<?php
class errorController {
    public function __construct()
    {

    }
    public function indexAction() {
        echo '<br>'. __METHOD__;
        exit;
    }
}