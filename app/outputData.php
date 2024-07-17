<?php
declare(strict_types=1);



$i = 0;
while (true) {
    if ($i === 0) {
        echo <<<EOL
        \n
        Если вы готовы продолжить играть, то введите и подтвердите 'Y', иначе 'N':
        EOL;

        $anwserYes = ["Y", "y"];
        $anwserNo = ["N", "n"];
        $anwserToContinue = readline();

        if (in_array($anwserToContinue, $anwserYes)) {
            echo <<<EOL
                Укажите какой высоты должны быть пирамиды: 
                EOL;
            $length = readline();
            echo "\ec";
            // echo "\e[12F";
            // echo "\e[0J";
            $pyramidWithoutDisks = createOriginalPyramid($length);
            $pyramidWithDisks = createPyramidWithDisks($length);
            $initArrOfArrs = createExamplesOfPyramid($pyramidWithDisks, $pyramidWithoutDisks);
            $initArr = getInitArr($initArrOfArrs);
            // echo "\e[12F";
            echo "\ec";
            $printArrays = printPyramids($initArr);
            $firstPyr = readline("Выберите первую пирамиду: ") . PHP_EOL;
            $secondPyr = readline("Выберите вторую пирамиду: ") . PHP_EOL;
            // echo "\e[0J";
            // echo "\e[12F";
            echo "\ec";
            $chosenPyramids = choosePyramids($initArr, $firstPyr, $secondPyr);
            $changedElemOfArr = changeElements($chosenPyramids);
            $mergedArrays = mergeArrays($initArr, $changedElemOfArr);
            // echo "\e[12F";
            echo "\ec";
            $printArrays = printPyramids($mergedArrays);
            $i++;
        } elseif (in_array($anwserToContinue, $anwserNo)) {
            break;
        }
    } else {
        $firstPyr = readline("Выберите первую пирамиду: ") . PHP_EOL;
        $secondPyr = readline("Выберите вторую пирамиду: ") . PHP_EOL;
        // echo "\e[0J";
        // echo "\e[12F";
        echo "\ec";
        $chosenPyramids = choosePyramids($mergedArrays, $firstPyr, $secondPyr);
        $changedElemOfArr = changeElements($chosenPyramids);
        $mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);
        $modArr = getModifiedPyramids($mergedArrays);
        // echo "\e[12F";
        echo "\ec";
        $printArrays = printPyramids($mergedArrays);
    }
}
