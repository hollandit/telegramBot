<?php
/**
 * Created by PhpStorm.
 * User: holland
 * Date: 31.07.2017
 * Time: 10:35
 */

$output = json_decode(file_get_contents('php://input'), true);
$id = $output['message']['chat']['id'];
file_get_contents("https://api.telegram.org/bot414134665:AAHfOIdeikQD04NdKckL8wadhqzggvmSqw0/sendMessage?chat_id=".$id."&text=i can see")
file_put_contents('logs.txt', $id);
