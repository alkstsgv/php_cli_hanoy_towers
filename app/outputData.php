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

$i = 0;
while (true) {
    if ($i === 0) {
        $anwser = ["y"];
        print_r(PHP_EOL . "Если вы готовы продолжить играть, то введите 'Y', иначе 'N': ");
        $anwserToContinue = strtolower(readline());
        if (in_array($anwserToContinue, $anwser, true)) {
            $length = trim(readline("Укажите какой высоты должны быть пирамиды: "));
            $initArrOfArrs = createTowers((int)$length);
            $redrawAndPrint = redrawAndPrintInConsole($initArrOfArrs);
            print_r("\e[2B");
            $chosePyramidInConsole = choosePyramidInConsole();
            $mergedArrays = moveElement($initArrOfArrs, (int)$chosePyramidInConsole[0], (int)$chosePyramidInConsole[1]);
            redrawAndPrintInConsole($mergedArrays);
            $i++;
        } else {
            break;
        }
    } else {
        print_r("\e[2B");
        $chosePyramidInConsole = choosePyramidInConsole();
        $mergedArrays = moveElement($mergedArrays, (int)$chosePyramidInConsole[0], (int)$chosePyramidInConsole[1]);
        redrawAndPrintInConsole($mergedArrays);
    }
}
