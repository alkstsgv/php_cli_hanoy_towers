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
)
);

/*
 * Создаёт пирамиду без дисков
 */
function createOriginalPyramid(string $countOfBlocks): array
{
    $countOfBlocks = (int) $countOfBlocks;
    $pyramidWithDisks = [];
    for ($i = 0; $i <= $countOfBlocks; $i++) {
        $doubleIndex = $i;
        $doubleIndex += $i;
        $i2 = 1;
        $i3 = $i2 + $i;
        $i2 += 1;
        $leftPadding = $countOfBlocks + $i3;
        if ($i < $countOfBlocks) {
            $pyramidWithDisks[] = str_pad(str_repeat((ASCIITAB[0] . str_repeat(ASCIITAB[2], $doubleIndex) . ASCIITAB[1]), 1), $doubleIndex, ASCIITAB[5], STR_PAD_LEFT);
        } else {
            $pyramidWithDisks[] = str_pad(str_repeat((ASCIITAB[0] . str_repeat(ASCIITAB[2], $doubleIndex) . ASCIITAB[1]), 1), $leftPadding, ASCIITAB[5], STR_PAD_LEFT);
        }
    }

    return $pyramidWithDisks;
}


/*
 * Создаёт пирамиду с дисками
 * принимает int $countOfDisks = кол-ву дисков
 */
function createPyramidWithDisks(string $countOfDisks): array
{
    $countOfBlocks = (int) $countOfDisks;
    $pyramidWithDisks = [];
    for ($i = 0; $i <= $countOfDisks; $i++) {
        $doubleIndex = $i;
        $doubleIndex += $i;
        if ($i === 0) {
            $pyramidWithDisks[] = str_pad(str_repeat((ASCIITAB[0] . str_repeat(ASCIITAB[2], $doubleIndex) . ASCIITAB[1]), 1), $doubleIndex, ASCIITAB[5], STR_PAD_LEFT);
        } else {
            $pyramidWithDisks[] = str_pad(str_repeat((ASCIITAB[3] . ASCIITAB[2] . ASCIITAB[2] . ASCIITAB[0] . str_repeat(ASCIITAB[2], $doubleIndex) . ASCIITAB[1] . ASCIITAB[2] . ASCIITAB[2] . ASCIITAB[4]), 1), $doubleIndex, ASCIITAB[5], STR_PAD_LEFT);
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
 * Функция принимает массив массивов
 * находит по индексам массивов заданные 
 * запаковывает их и отправляет
 */
function choosePyramids(array $inputArr, string $firstPyr, string $secondPyr): array
{
    $allowedValues = [1, 2, 3];
    while (true) {
        if (in_array($firstPyr, $allowedValues) || in_array($secondPyr, $allowedValues)) {
            $firstPyr = (int) ($firstPyr) - 1;
            $secondPyr = (int) ($secondPyr) - 1;
            break;
        } else {
            break;
        }
    }
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

    foreach ($arr as $key => [$item]) {
        $count = count($item);
        for ($i = 0; $i < $count; $i++) {
            $test[] = $item[$i];
            if ($test[$i] !== $item[$i]) {
                $numOfElem = $i;
                break;
            }
        }
    }

    foreach ($arr as [$item]) {
        $middleArr[] = $item[$numOfElem];
    }

    foreach ($arr as $key => [$value]) {
        $value[$numOfElem] = array_pop($middleArr);
        $outputArray[$key] = [$value];
    }

    return $outputArray;
}

/*
 * Функция объединяет новый массив массивов из двух элементов
 * с изначальным массивом массивов из трёх элементов по индексам
 */
function mergeArrays(array $initArr, array $modArr): array
{
    $replacedArray = array_replace_recursive($initArr, $modArr);
    return $replacedArray;
}


/*
 * Функция выводит полученный массив в консоль
 */
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
