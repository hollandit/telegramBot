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

if (isset($output['callback_query']['data'])){
    checkInline($output, $token);
}

switch ($message){
    case 'hi':
        $message = 'Hello';
        sendMessage($token, $id, $message.ReplyKeyboardRemove());
        break;
    case 'how are you':
        $message = 'I am fine';
        sendMessage($token, $id, $message.ReplyKeyboardRemove());
        break;
    case 'Inline_keyboard':
        $message = 'DOME';
        sendMessage($token, $id, $message.ReplyKeyboardRemove());
        break;
    default:
        $message = 'What are you say';
        sendMessage($token, $id, $message);
}

function ReplyKeyboardRemove(){
    $reply_markup = json_encode([
        'remove_keyboard' => true,
    ]);
    return 'reply_markup';
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

    $reply_markup = '&reply_markup='.$keyboard.'';
    return $reply_markup;
}

/**
 * @return string
 */
function inlineKeyboard(){
    $x1 = [
        'text' => 'inline_one',
        'callback_data' => 'inline_one',
    ];
    $x2 = [
        'text' => 'inline_five',
        'callback_data' => 'inline_five',
    ];

    $ops = [[$x1], [$x2]];
    $keyboard = [
      'inline_keyboard' => $ops,
    ];

    $keyboard = json_encode($keyboard, true);
    $reply_markup = '&reply_markup='.$keyboard;
    return $reply_markup;
}

function checkInline($output, $token){
        $id = $output['callback_query']['message']['chat']['id'];
        $message = $output['callback_query']['data'];
        sendMessage($token, $id, $message);
}
