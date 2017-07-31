<?php
/**
 * Created by PhpStorm.
 * User: holland
 * Date: 31.07.2017
 * Time: 10:35
 */

$output = json_decode(file_get_contents('php://input'), true);
file_put_contents('logs.txt', $output);
