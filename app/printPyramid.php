<?php
declare(strict_types=1);

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
