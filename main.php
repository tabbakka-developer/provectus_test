<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 14.11.2017
 * Time: 21:05
 */

require_once "timeConverter.php";

$data_start = $argv[1];
$data_end = $argv[2];

$timeConv = new timeConverter($data_start, $data_end);
$timeConv->Calc();

