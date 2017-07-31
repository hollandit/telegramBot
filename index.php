<?php
/**
 * Created by PhpStorm.
 * User: holland
 * Date: 31.07.2017
 * Time: 10:35
 */

$output = json_decode(file_get_contents('php://input'), true);
file_put_contents('logs.txt', $output);
$id = $output['message']['chat']['id'];
$token = '414134665:AAHfOIdeikQD04NdKckL8wadhqzggvmSqw0';
$message = $output['message']['text'];

switch ($message){
    case 'hi':
        $message = 'Hello';
        sendMessage($token, $id, $message);
        break;
    case 'How are you':
        $message = 'I am find';
        sendMessage($token, $id, $message.KeyboardMenu());
        break;
    default:
        $message = 'What are you say';
        sendMessage($token, $id, $message);
}

function sendMessage($token, $id, $message){
    file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$id."&text=".$message);
}
file_put_contents('logs.txt', $id);

function KeyboardMenu(){
    $buttons = [['hi'], ['how are you']];
    $keyboard = json_encode($keyboard = [
        'keyboard' => $buttons,
        'resize_keyboard' => true,
        'one_time_keyboard' => false,
        'selective' => true,
    ]);

    $replayKey = '$replay_markup'.$keyboard;
    return $replayKey;
}