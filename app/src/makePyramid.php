<?php
declare(strict_types=1);

const SLASH = "/";
const BACKSLASH = "\\";
const UNDERLINING = "_";
const LEFT_PARENTHESIS = "(";
const RIGHT_PARENTHESIS = ")";
const WHITESPACE = " ";
const VERTICAL_BAR = "|";
const PADDING_BETWEEN_PYRAMIDS = 50;

/*
 * Вспомогательная функция для генерирации строчку 
 * при создании пирамиды с диском или без дисков
 */
function createStringOfPyramid(string $flag, string $test, int $i): string
{
    (int)$index = $i * 2;
    $flagsValues  = [
        "createwithout",
        "createwith"
    ];
    $flag = strtolower(trim($flag));
    $stringWithoutDisks = str_pad(str_repeat(SLASH . str_repeat(UNDERLINING, $index) . BACKSLASH, 1), $index, WHITESPACE, STR_PAD_LEFT);
    $stringWithDisks = str_pad(str_repeat(LEFT_PARENTHESIS . str_repeat(UNDERLINING, 2) . SLASH . str_repeat(UNDERLINING, $index) .BACKSLASH . str_repeat(UNDERLINING, 2) .RIGHT_PARENTHESIS, 1), $index, WHITESPACE, STR_PAD_LEFT);
    
    if ($flag === "createwithout") {
        return $stringWithoutDisks;
    }

    if ($flag === "createwith") {
        if ($i === 0) {
            return $stringWithoutDisks;
        } else {
            return $stringWithDisks; 
        }
    }
    return $stringWithDisks;

}

/*
 * Создаёт пирамиду без дисков
 */
function createOriginalPyramid(int $countOfBlocks): array
{
    $countOfBlocks = (int)$countOfBlocks;
    $pyramidWithoutDisks = [];
    for ($i = 0; $i <= $countOfBlocks; $i++) {
        if ($i <= $countOfBlocks) {
            $pyramidWithoutDisks[] = createStringOfPyramid("createwithout", "", $i);
        } 
    }
    return $pyramidWithoutDisks;
}

/*
 * Создаёт пирамиду с дисками
 * принимает int $countOfDisks = кол-ву дисков
 */
function createPyramidWithDisks(int $countOfDisks): array
{
    $countOfBlocks = (int)$countOfDisks;
    $pyramidWithDisks = [];
    for ($i = 0; $i <= $countOfDisks; $i++) {
        $stringOfPyramid = "";
        if ($i === 0) {
            $pyramidWithDisks[] = createStringOfPyramid("createwith", "", $i);
        } else {
            $pyramidWithDisks[] = createStringOfPyramid("createwith", "", $i);
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

    foreach ($pyramidWithDisks as $key => $value) {
        $firstPyramidWithDisks = str_pad($value, PADDING_BETWEEN_PYRAMIDS, WHITESPACE, STR_PAD_BOTH);
        $secondPyramidWithoutDisks = str_pad($pyramidTwo[$key], PADDING_BETWEEN_PYRAMIDS, WHITESPACE, STR_PAD_BOTH);
        $thirdPyramidWithoutDisks = str_pad($pyramidThree[$key], PADDING_BETWEEN_PYRAMIDS, WHITESPACE, STR_PAD_BOTH) . PHP_EOL;
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
    return $array;
}


/*
 * Функция принимает массив массивов
 * находит по индексам массивов заданные 
 * запаковывает их и отправляет
 */
function choosePyramids(array $inputArr, int $firstPyr, int $secondPyr): array
{
    $allowedValues = [1, 2, 3];
    $outputArr = [];
    while (true) {
        if ((in_array($firstPyr, $allowedValues)) || (in_array($secondPyr, $allowedValues))) {
            $firstPyr = (int)$firstPyr - 1;
            $secondPyr = (int)$secondPyr - 1;
            break;
        } else {
            break;
        }
    }

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
    $numOfElem = 0;
    $counter = 0;
    $middleArr = [];
    $outputArray = [];

    foreach ($arr as $key => [$item]) {
        $counter = count($item);
        for ($i = 0; $i < $counter; $i++) {
            $middleArr[] = $item[$i];
            if ($middleArr[$i] !== $item[$i]) {
                $numOfElem = $i;
                $middleArr = [];
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
    foreach ($arr1 as $key => $arr) {
        foreach ($arr as $k => $value) {
            $left = str_pad($value, PADDING_BETWEEN_PYRAMIDS, WHITESPACE, STR_PAD_BOTH);
            $middle = str_pad($arr2[$key][$k], PADDING_BETWEEN_PYRAMIDS, WHITESPACE, STR_PAD_BOTH);
            $right = str_pad($arr3[$key][$k], PADDING_BETWEEN_PYRAMIDS, WHITESPACE, STR_PAD_BOTH) . PHP_EOL;
            print_r($left . $middle . $right);
        }
    }
}

// $length = 5;
// $pyramidWithoutDisks = createOriginalPyramid((int)$length);
//             $pyramidWithDisks = createPyramidWithDisks((int)$length);
//             $initArrOfArrs = createExamplesOfPyramid($pyramidWithDisks, $pyramidWithoutDisks);
//             $initArr = getInitArr($initArrOfArrs);