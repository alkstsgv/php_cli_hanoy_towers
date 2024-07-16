<?php
declare(strict_types=1);

function anyKey()
{
    echo "\e[31m";
    echo "Здравствуйте! Пожалуйста, введите своё имя." . PHP_EOL;
    // $prompt = "Здравствуйте, как вас зовут?";   
    $prompt = readline(); 
    // readline_callback_handler_install($prompt, function () {});
    // $keystroke = stream_get_contents(STDIN, 1);



  
    echo <<<EOL
    \e[32m
    Здравствуйте,\e[31m $prompt!
    \e[32m Вы запустили игру 'Ханойский башни'. \n 
    Правила игры: 
    1. Переместить все диски с пирамиды с дисками на пирамиду без дисков за как можно меньшее кол-во действий.  \n 
    Условия игры:
    1. Диски большего диаметра не могу лежать на дисках меньшего диаметра.
    2. Диски меньшего диаметра могут лежать на дисках большего диаметра.
    EOL;

    // echo "\e[2J";
    echo  <<<EOL
    \n
    Если вы готовы продолжить играть, то нажмите 'Y', иначе нажмите 'N:
    EOL;

    $prompt = readline();
    // echo "\e[31m";
    // readline_callback_handler_install($prompt, function($prompt) { $prompt = "y" ? "Вы нажали 'Да'" : "Вы нажали 'Нет'" });
    // $keystroke = stream_get_contents(STDIN, 1);
    // // readline_redisplay();

}

$anyKey = anyKey();
