<?php
declare(strict_types=1);

/* Функция для выбора пирамиды
*
*/
function choosePyramidInConsole(): array
{
    $choose = [
        $firstPyr = trim(readline("Выберите первую пирамиду: ")) . PHP_EOL,
        $secondPyr = trim(readline("Выберите вторую пирамиду: ")) . PHP_EOL
    ];
    return $choose;
}

/* Функция для перерисовки страницы
*/
function redrawConsolePage(): void
{
    print_r("\ec");
    print_r("\e[10B");
    print_r("\e[38;5;128m");
}

/* Функция для печати страницы в консоли
*/
function redrawAndPrintInConsole(array $array): void
{
    $redrawConsolePage = redrawConsolePage();
    $printArrays = printTowers($array);
}
