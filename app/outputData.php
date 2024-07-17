<?php
declare(strict_types=1);

$i = 0;
while (true) {
    if ($i === 0) {
        echo <<<EOL
        \n
        Если вы готовы продолжить играть, то введите 'Y', иначе 'N':
        EOL;

        $anwserYes = ["Y", "y"];
        $anwserNo = ["N", "n"];
        $anwserToContinue = readline();

        if (in_array($anwserToContinue, $anwserYes)) {

            echo <<<EOL
            Укажите какой высоты должны быть пирамиды: 
            EOL;

            $length = readline();

            echo <<<EOL
            \ec
            \e[10B
            \e[38;5;128m
            EOL;

            $pyramidWithoutDisks = createOriginalPyramid($length);
            $pyramidWithDisks = createPyramidWithDisks($length);
            $initArrOfArrs = createExamplesOfPyramid($pyramidWithDisks, $pyramidWithoutDisks);
            $initArr = getInitArr($initArrOfArrs);

            echo <<<EOL
            \ec \e[10B
            \e[38;5;128m
            EOL;

            $printArrays = printPyramids($initArr);
            echo "\e[2B";
            $firstPyr = readline("Выберите первую пирамиду: ") . PHP_EOL;
            $secondPyr = readline("Выберите вторую пирамиду: ") . PHP_EOL;

            echo <<<EOL
            \ec
            \e[10B
            \e[38;5;128m
            EOL;

            $chosenPyramids = choosePyramids($initArr, $firstPyr, $secondPyr);
            $changedElemOfArr = changeElements($chosenPyramids);
            $mergedArrays = mergeArrays($initArr, $changedElemOfArr);

            echo <<<EOL
            \ec
            \e[10B
            \e[38;5;128m
            EOL;

            $printArrays = printPyramids($mergedArrays);
            $i++;
        } elseif (in_array($anwserToContinue, $anwserNo)) {
            break;
        }
    } else {
        echo "\e[2B";
        $firstPyr = readline("Выберите первую пирамиду: ") . PHP_EOL;
        $secondPyr = readline("Выберите вторую пирамиду: ") . PHP_EOL;

        echo <<<EOL
        \ec
        \e[10B
        \e[38;5;128m
        EOL;

        $chosenPyramids = choosePyramids($mergedArrays, $firstPyr, $secondPyr);
        $changedElemOfArr = changeElements($chosenPyramids);
        $mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);

        echo <<<EOL
        \ec
        \e[10B
        \e[38;5;128m
        EOL;

        $printArrays = printPyramids($mergedArrays);
    }
}
