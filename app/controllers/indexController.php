<?php
    class indexController {
        //phuonge thức __construct() sẽ luôn được chạy ngay sau khi class được khởi tạo bằng tuef khóa new
        public function __construct()
        {

        }
        public function indexAction()
        {
            echo "<br> tôi là indexAction";
            echo '<br>'.__METHOD__;

        }
    }