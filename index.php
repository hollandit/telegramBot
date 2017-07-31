<?php
/**
 * Created by PhpStorm.
 * User: holland
 * Date: 31.07.2017
 * Time: 10:35
 */

$output = file_get_contents('php://input');
file_put_contents('logs.txt', $output);