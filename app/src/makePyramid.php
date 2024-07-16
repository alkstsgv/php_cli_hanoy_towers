<?php
declare(strict_types=1);



define('ASCIITAB', array(
    0 => "/",
    1 => "\\",
    2 => "_",
    3 => "(",
    4 => ")",
    5 => " ",
    6 => "|"
));

/*
 * Создаёт пирамиду без дисков
 */
function createOriginalPyramid(int $countOfBlocks = 0): array
{
    $pyramidWithDisks = [];
    for ($i = 0; $i <= $countOfBlocks; $i++) {
        $doubleIndex = $i;
        $doubleIndex += $i;
        $i2 = 1;
        $i3 = $i2 + $i;
        $i2 += 1;
        $leftPadding = $countOfBlocks+$i3;
        if ($i < $countOfBlocks) {
            $pyramidWithDisks[] = str_pad(str_repeat((ASCIITAB[0] . str_repeat(ASCIITAB[2], $doubleIndex) . ASCIITAB[1]), 1), $doubleIndex, ASCIITAB[5], STR_PAD_LEFT);
        } else {
            $pyramidWithDisks[] =  str_pad(str_repeat(( ASCIITAB[0]  . str_repeat(ASCIITAB[2], $doubleIndex)  . ASCIITAB[1]), 1), $leftPadding, ASCIITAB[5], STR_PAD_LEFT);
        }
    }

    return $pyramidWithDisks;
}


/*
 * Создаёт пирамиду с дисками
 * принимает int $countOfDisks = кол-ву дисков
 */
function createPyramidWithDisks(int $countOfDisks = 0): array
{
    $pyramidWithDisks = [];
    for ($i = 0; $i <= $countOfDisks; $i++) {
        $doubleIndex = $i;
        $doubleIndex += $i;
        if ($i === 0) {
            $pyramidWithDisks[] =  str_pad(str_repeat((ASCIITAB[0]  . str_repeat(ASCIITAB[2], $doubleIndex)  . ASCIITAB[1]), 1), $doubleIndex, ASCIITAB[5], STR_PAD_LEFT);
        } else {
            $pyramidWithDisks[] =  str_pad(str_repeat((ASCIITAB[3] . ASCIITAB[2] . ASCIITAB[2] . ASCIITAB[0]  . str_repeat(ASCIITAB[2], $doubleIndex)  . ASCIITAB[1] . ASCIITAB[2] . ASCIITAB[2] . ASCIITAB[4]), 1), $doubleIndex, ASCIITAB[5], STR_PAD_LEFT);
        }
    }
    return $pyramidWithDisks;
}



/*
 * Создаёт экземппляр пирамиды с дисками, 2 экземпляра пирамиды без дисков
 */
function createExamplesOfPyramid(array $pyrWithDisks, array $pyrWithoutDisks): array
{
    $pyramidWithDisks = $pyrWithDisks;
    $pyramidTwo = $pyrWithoutDisks;
    $pyramidThree = $pyrWithoutDisks;
    $paddingBetweenPyramids = 50;

    foreach ($pyramidWithDisks as $key => $value) {
        $firstPyramidWithDisks = str_pad($value, $paddingBetweenPyramids, ASCIITAB[5], STR_PAD_BOTH);
        $secondPyramidWithoutDisks = str_pad($pyramidTwo[$key], $paddingBetweenPyramids, ASCIITAB[5], STR_PAD_BOTH);
        $thirdPyramidWithoutDisks = str_pad($pyramidThree[$key], $paddingBetweenPyramids, ASCIITAB[5], STR_PAD_BOTH) . PHP_EOL;
//        print_r($firstPyramidWithDisks . $secondPyramidWithoutDisks . $thirdPyramidWithoutDisks);
    }

    $arrOfPyr = [
        [$pyramidWithDisks],
        [$pyramidTwo],
        [$pyramidThree]
    ];

    return $arrOfPyr;
}


/*
 * Функция возвращает изначально созданный массив
 */
function getInitArr(array $array): array
{
    $initArray = $array;
    return $array;
}

/*
 * Функция возвращает модифицированный массив
 */
function getModifiedPyramids(array $array): array
{
    $modArray = $array;
    return $array;
}


/*
 * Функция принимает массив массивов
 * находит по индексам массивов заданные 
 * запаковывает их и отправляет
 */
function choosePyramids(array $inputArr, string $firstPyr, string $secondPyr): array
{
    $firstPyr = (int)($firstPyr);
    $secondPyr = (int)($secondPyr);
    $outputArr = [];

    foreach ($inputArr as $key => [$item]) {
        if ($key === $firstPyr) {
            $outputArr[$key] = [$item];
        } elseif ($key === $secondPyr) {
            $outputArr[$key] = [$item];
        }
    }
    return $outputArr;
}



/*
 * Функция меняет местами конкретные элементы в двух массивах через кучу
 */
//function changeElements(array $arr, int $numOfElem): array
//{
//
//    $middleArr = [];
//    $outputArray = [];
//
//    foreach ($arr as [$item] ) {
//        $middleArr[] = $item[$numOfElem];
//    }
////var_dump($middleArr);
//    foreach ($arr as $key => [$value]) {
//        $value[$numOfElem] = array_pop($middleArr);
//        $outputArray[$key] = [$value];
//    }
////    var_dump($outputArray);
//    return $outputArray;
//
//}

/*
 * Функция сверяет элементы двух массивов, если они не равны, тогда идёт выше, пока не найдет элементы, которые равны.
 * Затем следующий элемент из массива A меняется с элементом массива B по ключу $numOfElem/
 */
function changeElements(array $arr): array
{
    $middleArr = [];
    $outputArray = [];
    $numOfElem = 0;
    $test = [];
    $count = 0;

    foreach ($arr as $key => [$item] ) {
        $count = count($item);
        for ($i = 0; $i < $count; $i++) {
            $test[] = $item[$i];
            if ($test[$i] !== $item[$i]) {
                $numOfElem = $i;
                break;
            }
        }
    }

    foreach ($arr as [$item] ) {
        $middleArr[] = $item[$numOfElem];
    }

    foreach ($arr as $key => [$value]) {
        $value[$numOfElem] = array_pop($middleArr);
        $outputArray[$key] = [$value];
    }

    return $outputArray;
}


function mergeArrays(array $initArr, array $modArr): array
{
    $replacedArray = array_replace_recursive($initArr, $modArr);
//    print_r(array_replace_recursive($initArr, $modArr));
//    var_dump($replacedArray);
    return $replacedArray;
}


function printPyramids(array $array): void
{
    [$arr1, $arr2, $arr3] = $array;
    $paddingBetweenPyramids = 50;

    foreach ($arr1 as $key => $arr) {
        foreach ($arr as $k => $v) {
            $left = (str_pad($v, $paddingBetweenPyramids, ASCIITAB[5], STR_PAD_BOTH));
            $middle = (str_pad($arr2[$key][$k], $paddingBetweenPyramids, ASCIITAB[5], STR_PAD_BOTH));
            $right = (str_pad($arr3[$key][$k], $paddingBetweenPyramids, ASCIITAB[5], STR_PAD_BOTH) . PHP_EOL);
            print_r($left . $middle . $right);
        }
    }

}
$pyramidWithoutDisks = createOriginalPyramid(7);
$pyramidWithDisks = createPyramidWithDisks(7);
$initArrOfArrs = createExamplesOfPyramid($pyramidWithDisks, $pyramidWithoutDisks);
$initArr = getInitArr($initArrOfArrs);
// $printArrays = printPyramids($initArr);


// $chosenPyramids = choosePyramids($initArr, "0", "1");
// $changedElemOfArr = changeElements($chosenPyramids);
// $mergedArrays = mergeArrays($initArr, $changedElemOfArr);
// $modArr = getModifiedPyramids($mergedArrays);
// $printArrays = printPyramids($mergedArrays);

// // $modArr1 = $modArr;
// // var_dump($modArr1);
// // var_dump($modArr === $modArr1);
// $chosenPyramids = choosePyramids($mergedArrays, "0", "2");
// $changedElemOfArr = changeElements($chosenPyramids);
// $mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);
// $modArr = getModifiedPyramids($mergedArrays);
// $printArrays = printPyramids($mergedArrays);

// $printArrays = printPyramids($mergedArrays);
// var_dump($modArr === $modArr1);
// var_dump($modArr);

// $chosenPyramids = choosePyramids($mergedArrays, "1", "2");
// $changedElemOfArr = changeElements($chosenPyramids);
// $mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);
// $printArrays = printPyramids($mergedArrays);

// $chosenPyramids = choosePyramids($mergedArrays, "0", "1");
// $changedElemOfArr = changeElements($chosenPyramids);
// $mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);
// $printArrays = printPyramids($mergedArrays);




// var_dump($modArr);

$i = 0;
while (true) {

    if ($i === 0) {
        $pyramidWithoutDisks = createOriginalPyramid(7);
        $pyramidWithDisks = createPyramidWithDisks(7);
        $initArrOfArrs = createExamplesOfPyramid($pyramidWithDisks, $pyramidWithoutDisks);
        $initArr = getInitArr($initArrOfArrs);
        $printArrays = printPyramids($initArr);

        $firstPyr = readline("Выберите первую пирамиду: ") . PHP_EOL;
        $secondPyr = readline("Выберите вторую пирамиду: ") . PHP_EOL;
        print_r($firstPyr);
        print_r($secondPyr);

        $chosenPyramids = choosePyramids($initArr, $firstPyr, $secondPyr);
        $changedElemOfArr = changeElements($chosenPyramids);
        $mergedArrays = mergeArrays($initArr, $changedElemOfArr);
        // echo "\e[2J";

        $printArrays = printPyramids($mergedArrays);

        $i++;

    } else {
        
        $firstPyr = readline("Выберите первую пирамиду: ") . PHP_EOL;
        $secondPyr = readline("Выберите вторую пирамиду: ") . PHP_EOL;
        print_r($firstPyr);
        print_r($secondPyr);

        $chosenPyramids = choosePyramids($mergedArrays, $firstPyr, $secondPyr);
        $changedElemOfArr = changeElements($chosenPyramids);
        $mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);
        $modArr = getModifiedPyramids($mergedArrays);
        // $printArrays = printPyramids($mergedArrays);
        // echo "\e[8F";
        // echo "\e[2J";
        // echo "\e[8E";
        // echo "\e[20T";
        $printArrays = printPyramids($mergedArrays);

    }
   

    
} 

