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

//
//function printAsciiSymbol(string $symbol, int $count): string
//{
//
//    $asciiValue = ASCIITAB;
//    $i = 0;
//    $sym = '';
//
//    for ($i = 0; $i < count($asciiValue); $i++) {
//        if ($asciiValue[$i] == $symbol) {
//            $sym = $symbol;
//        }
//    }
//
//    for ($i = 0; $i < $count; $i++) {
//        print_r($sym);
//    }
//
//    return "";
//}
//
//function printEdges(string $width, string $height)
//{
//    $timesOfRepeatingSym = 1;
//    echo ASCIITAB[5] . str_repeat(ASCIITAB[2], $width) . PHP_EOL;
//
//    echo str_repeat(str_repeat(ASCIITAB[6] , $timesOfRepeatingSym) .  str_pad("", $width, ASCIITAB[5]) . ASCIITAB[6] . PHP_EOL , $height)  ;
//
//    echo ASCIITAB[5] . str_repeat(ASCIITAB[2], $width) . PHP_EOL;
//
//
//}
//printEdges(readline("Введите длину вашего терминала: "), readline("Введите ширину вашего терминала: "));




//function test() //string $foundation, string $heightOfSide
//{
//    $timesOfRepeatingSym = 1;
//    echo str_repeat( ASCIITAB[5], 3) . str_repeat( ASCIITAB[0], 1) .
//        str_repeat( ASCIITAB[1], 1). PHP_EOL;

//    echo str_repeat(str_repeat( ASCIITAB[6] , $timesOfRepeatingSym) . str_pad("", 230, ASCIITAB[5]) . ASCIITAB[6] . PHP_EOL, 10);
//    echo str_repeat(str_repeat( ASCIITAB[0] , $timesOfRepeatingSym) . str_pad("", 2, ASCIITAB[5]) . ASCIITAB[1] . PHP_EOL, 1);
//    $t1 = t1();
//    print_r(gettype($t1));
//    echo str_repeat(str_repeat( ASCIITAB[0] , $timesOfRepeatingSym) . str_pad("",5, ASCIITAB[5]) . ASCIITAB[1] . PHP_EOL, 5);

//    echo str_repeat( str_pad("",3, ASCIITAB[5]) . ASCIITAB[0] . ASCIITAB[1] . PHP_EOL, 5);
//    echo str_repeat( str_pad("",3, ASCIITAB[5]) . ASCIITAB[0] . str_pad("",2, ASCIITAB[5], STR_PAD_LEFT) . ASCIITAB[1] . PHP_EOL, 5);


//    echo str_repeat( ASCIITAB[0] . str_pad("",3, ASCIITAB[5]) . ASCIITAB[1] . PHP_EOL, 5);

//    echo str_repeat( str_pad("",0, ASCIITAB[5]) . str_repeat( ASCIITAB[5] , 1) . ASCIITAB[1] . PHP_EOL, 5);
//    echo  str_repeat( ASCIITAB[2], 12) . PHP_EOL;

//    echo str_repeat(str_repeat( ASCIITAB[0] , 1) . str_pad("", 1, ASCIITAB[5]) . str_repeat( ASCIITAB[1] , 1) . PHP_EOL, 1);
//    echo str_repeat(str_repeat( ASCIITAB[0] , 1) . str_pad("", 1, ASCIITAB[5]) . str_repeat( ASCIITAB[1] , 1) . PHP_EOL, 1);
//}

//test();


//function printPyramidWithDisks1(): array
//{
//    $pyramidWithDisks = [];
//    $countOfPyramids = 1;
//    $countOfDisks = 4;
//    $leftPadding = 20;
//    $lengthToAnotherFigure = 0;
//
//
//    for ($i = 0; $i <= $countOfDisks; $i++)
//    {
//        $indexToZero = $countOfDisks - $i;
//        $doubleIndex = $i;
//        $doubleIndex += $i;
//        $lengthBetweenFigures = $indexToZero + $lengthToAnotherFigure;
//
//        if ($i === 0) {
//            $pyramidWithDisks[] = PHP_EOL . str_repeat(ASCIITAB[5], $leftPadding) . str_repeat(str_repeat(
//                    str_repeat(ASCIITAB[5], $indexToZero), 1)
//                . str_repeat(ASCIITAB[2], 3)
//                . str_repeat(ASCIITAB[0], 1)
//                . str_repeat(ASCIITAB[2], $doubleIndex)
//                . str_repeat(str_repeat(ASCIITAB[1], 1), 1)
//                . str_repeat(ASCIITAB[2], 3) . str_repeat(ASCIITAB[5], $lengthBetweenFigures) , $countOfPyramids) ;
//        }
//        elseif ($i != $countOfDisks) {
//            $pyramidWithDisks[] = PHP_EOL . str_repeat(ASCIITAB[5], $leftPadding) . str_repeat(str_repeat(
//                        str_repeat(ASCIITAB[5], $indexToZero), 1)
////                . str_repeat(ASCIITAB[5], 3)
//                . str_repeat(ASCIITAB[3], 1) . str_repeat(ASCIITAB[2], 2)
//                . str_repeat(ASCIITAB[0], 1)
//                . str_repeat(ASCIITAB[2], $doubleIndex)
//                . str_repeat(str_repeat(ASCIITAB[1], 1), 1)
//                . str_repeat(ASCIITAB[2], 2) . str_repeat(ASCIITAB[4] . str_repeat(ASCIITAB[5], $lengthBetweenFigures), 1), $countOfPyramids);
//        } else {
//            $pyramidWithDisks[] =  PHP_EOL . str_repeat(ASCIITAB[5], $leftPadding) . str_repeat(str_repeat(str_repeat(ASCIITAB[5], $indexToZero + 3), 1)
//                . str_repeat(ASCIITAB[0], 1)
//                . str_repeat(ASCIITAB[2], $doubleIndex)
//                . str_repeat(str_repeat(ASCIITAB[1], 1) . str_repeat(ASCIITAB[5], $indexToZero + 3), 1) , $countOfPyramids);
//        }
//
//    }
//    return $pyramidWithDisks;
//
//
//}
//
//print_r(implode(printPyramidWithDisks1()));

//function printPyramidWithoutDisks1(): array
//{
//    $pyramidWithDisks = [];
//    $countOfPyramids = 2;
//    $countOfDisks = 4;
//    $leftPadding = 20;
//    $lengthToAnotherFigure = 10;
//
//    for ($i = 0; $i <= $countOfDisks; $i++)
//    {
//        $indexToZero = $countOfDisks - $i;
//        $doubleIndex = $i;
//        $doubleIndex += $i;
//        $lengthBetweenFigures = $indexToZero + $lengthToAnotherFigure;
//
//
//        if ($i === 0) {
//            $pyramidWithDisks[] = PHP_EOL . str_repeat(ASCIITAB[5], $leftPadding) . str_repeat(str_repeat(
//                        str_repeat(ASCIITAB[5], $indexToZero), 1)
//
//                    . str_repeat(ASCIITAB[0], 1)
//                    . str_repeat(ASCIITAB[2], $doubleIndex)
//                    . str_repeat(str_repeat(ASCIITAB[1], 1), 1)
//                    .  str_repeat(ASCIITAB[5], $lengthBetweenFigures) , $countOfPyramids) ;
//        }
//        elseif ($i != $countOfDisks) {
//            $pyramidWithDisks[] = PHP_EOL . str_repeat(ASCIITAB[5], $leftPadding) . str_repeat(str_repeat(
//                        str_repeat(ASCIITAB[5], $indexToZero), 1)
////                . str_repeat(ASCIITAB[5], 3)
//
//                    . str_repeat(ASCIITAB[0], 1)
//                    . str_repeat(ASCIITAB[2], $doubleIndex)
//                    . str_repeat(str_repeat(ASCIITAB[1], 1), 1)
//                    . str_repeat( str_repeat(ASCIITAB[5], $lengthBetweenFigures), 1), $countOfPyramids);
//        } else {
//            $pyramidWithDisks[] =  PHP_EOL . str_repeat(ASCIITAB[5], $leftPadding) . str_repeat(str_repeat(str_repeat(ASCIITAB[5], $indexToZero ), 1)
//                    . str_repeat(ASCIITAB[0], 1)
//                    . str_repeat(ASCIITAB[2], $doubleIndex)
//                    . str_repeat(str_repeat(ASCIITAB[1], 1) . str_repeat(ASCIITAB[5], $lengthBetweenFigures ), 1) , $countOfPyramids);
//        }
//
//    }
//    return $pyramidWithDisks;
//
//
//}
//print_r(str_repeat(implode(printPyramidWithoutDisks()), 4));


//function printPyramidAnotherWay(): array
//{
//    $pyramidWithDisks = [];
//    $countOfPyramids = 2;
//    $countOfDisks = 4;
//    $leftPadding = 20;
//    $lengthToAnotherFigure = 10;
//
//
//
//    for ($i = 0; $i <= $countOfDisks; $i++)
//    {
//        $indexToZero = $countOfDisks - $i;
//        $doubleIndex = $i;
//        $doubleIndex += $i;
//        $lengthBetweenFigures = $indexToZero + $lengthToAnotherFigure;
//
//
//        if ($i === 0) {
//            $pyramidWithDisks[] = str_pad(str_pad((ASCIITAB[0]. ASCIITAB[1]), 8, ASCIITAB[2], STR_PAD_BOTH), 20, ASCIITAB[5], STR_PAD_BOTH);
//        }
//        elseif ($i != $countOfDisks) {
//            $t4 = str_pad(str_pad(ASCIITAB[0], $doubleIndex, ASCIITAB[2], STR_PAD_RIGHT), $doubleIndex+1, ASCIITAB[1], STR_PAD_RIGHT);
//            $t5 = str_pad($t4, $doubleIndex+4, ASCIITAB[3] . ASCIITAB[2] . ASCIITAB[2], STR_PAD_LEFT);
//            $pyramidWithDisks[] = str_pad($t5, 19, ASCIITAB[2] . ASCIITAB[2] . ASCIITAB[4], STR_PAD_RIGHT);
//        } else {
//            $pyramidWithDisks[] =  str_pad(str_pad(ASCIITAB[0], $doubleIndex, ASCIITAB[2], STR_PAD_RIGHT), $doubleIndex+1, ASCIITAB[1], STR_PAD_RIGHT);
//        }
//
//    }
//    print_r($doubleIndex);
//    return $pyramidWithDisks;
//
//
//}


//print_r(printPyramidAnotherWay());
//
//$t2[] = str_pad((ASCIITAB[0]. ASCIITAB[1]), 8, "_", STR_PAD_BOTH);
//$t3[] = str_pad(str_pad((ASCIITAB[0]. ASCIITAB[1]), 8, "_", STR_PAD_BOTH), 20, " ", STR_PAD_BOTH);
//
//for ($i = 0; $i <= 10; $i++){
//    print_r(implode($t3));
//}

//print_r($t2);

//$t4 = str_pad(str_pad(ASCIITAB[0], 12, "_", STR_PAD_RIGHT), 13, ASCIITAB[1], STR_PAD_RIGHT);
//
//$t5 = str_pad($t4, 16, "(__", STR_PAD_LEFT);
//$t6[] = str_pad($t5, 19, "__)", STR_PAD_RIGHT);

//for ($i = 0; $i < 4; $i++){
//   print_r(implode($t6));
//}

//function printPyramidWithDisks1(int $countOfDisks): array
//{
//    $pyramidWithDisks = [];
//    $countOfPyramids = 1;
//    $countOfDisks = 4;
//    $leftPadding = 20;
//    $lengthToAnotherFigure = 0;
//
//
//    for ($i = 0; $i <= $countOfDisks; $i++)
//    {
//        $indexToZero = $countOfDisks - $i;
//        $doubleIndex = $i;
//        $doubleIndex += $i;
//        $lengthBetweenFigures = $indexToZero + $lengthToAnotherFigure;
//
//        if ($i === 0) {
//            $pyramidWithDisks[] = PHP_EOL . str_repeat(ASCIITAB[5], $leftPadding) . str_repeat(str_repeat(
//                        str_repeat(ASCIITAB[5], $indexToZero), 1)
//                    . str_repeat(ASCIITAB[2], 3)
//                    . str_repeat(ASCIITAB[0], 1)
//                    . str_repeat(ASCIITAB[2], $doubleIndex)
//                    . str_repeat(str_repeat(ASCIITAB[1], 1), 1)
//                    . str_repeat(ASCIITAB[2], 3) . str_repeat(ASCIITAB[5], $lengthBetweenFigures) , $countOfPyramids) ;
//        }
//        elseif ($i != $countOfDisks) {
//            $pyramidWithDisks[] = PHP_EOL . str_repeat(ASCIITAB[5], $leftPadding) . str_repeat(str_repeat(
//                        str_repeat(ASCIITAB[5], $indexToZero), 1)
////                . str_repeat(ASCIITAB[5], 3)
//                    . str_repeat(ASCIITAB[3], 1) . str_repeat(ASCIITAB[2], 2)
//                    . str_repeat(ASCIITAB[0], 1)
//                    . str_repeat(ASCIITAB[2], $doubleIndex)
//                    . str_repeat(str_repeat(ASCIITAB[1], 1), 1)
//                    . str_repeat(ASCIITAB[2], 2) . str_repeat(ASCIITAB[4] . str_repeat(ASCIITAB[5], $lengthBetweenFigures), 1), $countOfPyramids);
//        } else {
//            $pyramidWithDisks[] =  PHP_EOL . str_repeat(ASCIITAB[5], $leftPadding) . str_repeat(str_repeat(str_repeat(ASCIITAB[5], $indexToZero + 3), 1)
//                    . str_repeat(ASCIITAB[0], 1)
//                    . str_repeat(ASCIITAB[2], $doubleIndex)
//                    . str_repeat(str_repeat(ASCIITAB[1], 1) . str_repeat(ASCIITAB[5], $indexToZero + 3), 1) , $countOfPyramids);
//        }
//
//    }
//    return $pyramidWithDisks;
//
//
//}
//
//print_r(implode(printPyramidWithDisks1(7)));



/*
 * Создаёт пирамиду без дисков
 */
function createOriginalPyramid(int $countOfBlocks = 0): array
{
    $pyramidWithDisks = [];
//    $countOfPyramids = 2;
//    $countOfDisks = 15;


    for ($i = 0; $i <= $countOfBlocks; $i++) {
//        $indexToZero = $countOfDisks - $i;
        $doubleIndex = $i;
        $doubleIndex += $i;
        $i2 = 1;
        $i3 = $i2 + $i;
        $i2 += 1;
        $leftPadding = $countOfBlocks+$i3;

//        print_r( $leftPadding . " Это {$i} раз и padding равно {$leftPadding}" . PHP_EOL);
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
//    $countOfPyramids = 2;
//    $countOfDisks = 7;


    for ($i = 0; $i <= $countOfDisks; $i++) {
//        $indexToZero = $countOfDisks - $i;
        $doubleIndex = $i;
        $doubleIndex += $i;


//        print_r( $leftPadding . " Это {$i} раз и padding равно {$leftPadding}" . PHP_EOL);
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
        $thirdPyramidWithoutDisks = makePyramid . phpstr_pad($pyramidThree[$key], $paddingBetweenPyramids, ASCIITAB[5], STR_PAD_BOTH) . PHP_EOL;
//        print_r($firstPyramidWithDisks . $secondPyramidWithoutDisks . $thirdPyramidWithoutDisks);
    }

    $arrOfPyr = [
        [$pyramidWithDisks],
        [$pyramidTwo],
        [$pyramidThree]
    ];

    return $arrOfPyr;
}

//var_dump($initArrOfArrs);



//getArrays($initArrOfArrs);




/*
 * Функция возвращает изначально созданный массив
 */
function getInitArr(array $array): array
{
    return $array;
}

/*
 * Функция возвращает модифицированный массив
 */
function getModifiedPyramids(array $array): array
{

    $test = $array;
//    var_dump($test);
    return $test;
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
//    var_dump($outputArr);
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

//    var_dump($arr);
//    $numOfElem = (int)($numOfElem);
//    $numOfElem = $numOfElem != 0 ? $numOfElem : 1; // нельзя взять самый первый элемент любой пирамиды

    $middleArr = [];
    $outputArray = [];
    $numOfElem = 0;
    $test = [];
    $count = 0;
//    print_r("numOfElem до = {$numOfElem}" . PHP_EOL);


    foreach ($arr as $key => [$item] ) {
        $count = count($item);
//        $numOfElem = $count;

        for ($i = 0; $i < $count; $i++){
            $test[] = $item[$i];
            if ($test[$i] !== $item[$i]) {

                    $numOfElem = $i;
//                    print_r("numOfElem во время выполнения = {$numOfElem}" . PHP_EOL);
//                    print_r($test[$i]);

                    break;

            }
        }
//        print_r("numOfElem после = {$numOfElem}");


    }

    foreach ($arr as [$item] ) {
        $middleArr[] = $item[$numOfElem];
    }
//var_dump($middleArr);
    foreach ($arr as $key => [$value]) {
        $value[$numOfElem] = array_pop($middleArr);
        $outputArray[$key] = [$value];
    }
//    var_dump($outputArray);
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
            $right = (makePyramid . phpstr_pad($arr3[$key][$k], $paddingBetweenPyramids, ASCIITAB[5], STR_PAD_BOTH) . PHP_EOL);
            print_r($left . $middle . $right);
        }
    }

}

$pyramidWithoutDisks = createOriginalPyramid(7);
$pyramidWithDisks = createPyramidWithDisks(7);
$initArrOfArrs = createExamplesOfPyramid($pyramidWithDisks, $pyramidWithoutDisks);
$initArr = getInitArr($initArrOfArrs);

$chosenPyramids = choosePyramids($initArr, "0", "1");
$changedElemOfArr = changeElements($chosenPyramids);
$mergedArrays = mergeArrays($initArr, $changedElemOfArr);
$printArrays = printPyramids($mergedArrays);


$chosenPyramids = choosePyramids($mergedArrays, "0", "2");
$changedElemOfArr = changeElements($chosenPyramids);
$mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);
$printArrays = printPyramids($mergedArrays);


$chosenPyramids = choosePyramids($mergedArrays, "1", "2");
$changedElemOfArr = changeElements($chosenPyramids);
$mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);
$printArrays = printPyramids($mergedArrays);

$chosenPyramids = choosePyramids($mergedArrays, "0", "1");
$changedElemOfArr = changeElements($chosenPyramids);
$mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);
$printArrays = printPyramids($mergedArrays);




//$chosenPyramids = choosePyramids($mergedArrays, "1", "2");
//$changedElemOfArr = changeElements($chosenPyramids);
//$mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);
//
//$chosenPyramids = choosePyramids($mergedArrays, "0", "1");
//$changedElemOfArr = changeElements($chosenPyramids);
//$mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);
//
//
//$chosenPyramids = choosePyramids($mergedArrays, "1", "2");
//$changedElemOfArr = changeElements($chosenPyramids);
//$mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);
//
//$chosenPyramids = choosePyramids($mergedArrays, "0", "1");
//$changedElemOfArr = changeElements($chosenPyramids);
//$mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);
//
//$chosenPyramids = choosePyramids($mergedArrays, "1", "2");
//$changedElemOfArr = changeElements($chosenPyramids);
//$mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);
//
//$chosenPyramids = choosePyramids($mergedArrays, "0", "2");
//$changedElemOfArr = changeElements($chosenPyramids);
//$mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);
//
//$chosenPyramids = choosePyramids($mergedArrays, "1", "2");
//$changedElemOfArr = changeElements($chosenPyramids);
//$mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);
//
//
//$chosenPyramids = choosePyramids($mergedArrays, "0", "2");
//$changedElemOfArr = changeElements($chosenPyramids);
//$mergedArrays = mergeArrays($mergedArrays, $changedElemOfArr);





