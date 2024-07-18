<?php
declare(strict_types=1);

$i = 0;
while (true) {
    if ($i === 0) {
        echo <<<EOL
        \n
        Если вы готовы продолжить играть, то введите 'Y', иначе 'N':
        EOL;

        $anwser = ["y", "n"];
        $anwserToContinue = readline();
        $anwserToContinue = strtolower($anwserToContinue);
        if (in_array($anwserToContinue, $anwser, true)) {

            echo <<<EOL
            Укажите какой высоты должны быть пирамиды: 
            EOL;

            $length = readline();

            echo <<<EOL
            \ec
            \e[10B
            \e[38;5;128m
            EOL;

            $pyramidWithoutDisks = createOriginalPyramid((int)$length);
            $pyramidWithDisks = createPyramidWithDisks((int)$length);
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
        } elseif (in_array($anwserToContinue, $anwser)) {
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
