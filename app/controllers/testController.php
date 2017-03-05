<?php
namespace app\controllers;

class testController extends baseController {
    public function __construct() {
    }

    public function calendar($year, $month, $day) {
        echo 'Calendar for ' . $year . '-' . $month . '-' . $day;
    }

    public function aaa() {
		echo 'Hello, Im testController#aaa()';
        dd($_GET);
    }
}