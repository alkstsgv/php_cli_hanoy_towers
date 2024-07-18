<?php
declare(strict_types=1);

$i = 0;
while (true) {
    if ($i === 0) {
        $anwser = ["y", "n"];
        
        echo <<<EOL
        \n
        Если вы готовы продолжить играть, то введите 'Y', иначе 'N':
        EOL;
        
        $anwserToContinue = strtolower(readline());
        if (in_array($anwserToContinue, $anwser, true)) {
            $length = trim(readline("Укажите какой высоты должны быть пирамиды:"));
            
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

            $firstPyr = trim(readline("Выберите первую пирамиду: ")) . PHP_EOL;
            $secondPyr = trim(readline("Выберите вторую пирамиду: ")) . PHP_EOL;

            echo <<<EOL
            \ec
            \e[10B
            \e[38;5;128m
            EOL;

            $chosenPyramids = choosePyramids($initArr, (int)$firstPyr, (int)$secondPyr);
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
        $firstPyr = trim(readline("Выберите первую пирамиду: ")) . PHP_EOL;
        $secondPyr = trim(readline("Выберите вторую пирамиду: ")) . PHP_EOL;

        echo <<<EOL
        \ec
        \e[10B
        \e[38;5;128m
        EOL;

        $chosenPyramids = choosePyramids($mergedArrays, (int)$firstPyr, (int)$secondPyr);
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
