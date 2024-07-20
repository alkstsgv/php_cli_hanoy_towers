<?php
declare(strict_types=1);


function choosePyramidInConsole(): array
{
    $choose = [
        $firstPyr = trim(readline("Выберите первую пирамиду: ")) . PHP_EOL,
        $secondPyr = trim(readline("Выберите вторую пирамиду: ")) . PHP_EOL
    ];
    return $choose;
}

function redrawConsolePage(): void
{
    echo <<<EOL
        \ec
        \e[10B
        \e[38;5;128m
        EOL;
}
function redrawAndPrintInConsole(array $array): void
{
    $redrawConsolePage = redrawConsolePage();
    $printArrays = printPyramids($array);
}

$i = 0;
while (true) {
    if ($i === 0) {
        $anwser = ["y"];
        echo PHP_EOL . "Если вы готовы продолжить играть, то введите 'Y', иначе 'N': ";
        $anwserToContinue = strtolower(readline());
        if (in_array($anwserToContinue, $anwser, true)) {
            $length = trim(readline("Укажите какой высоты должны быть пирамиды: "));
            $initArrOfArrs = create((int)$length);
            redrawAndPrintInConsole($initArrOfArrs);

            echo "\e[2B";
            $chosePyramidInConsole = choosePyramidInConsole();
            $mergedArrays = merge($initArrOfArrs, (int)$chosePyramidInConsole[0], (int)$chosePyramidInConsole[1]);
            redrawAndPrintInConsole($mergedArrays);
            $i++;
        } else {
            break;
        }
    } else {
        echo "\e[2B";
        $chosePyramidInConsole = choosePyramidInConsole();
        $mergedArrays = merge($mergedArrays, (int)$chosePyramidInConsole[0], (int)$chosePyramidInConsole[1]);
        redrawAndPrintInConsole($mergedArrays);
    }
}