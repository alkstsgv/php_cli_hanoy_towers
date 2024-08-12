<?php
declare(strict_types=1);

const SLASH = "/";
const BACKSLASH = "\\";
const UNDERLINING = "_";
const LEFT_PARENTHESIS = "(";
const RIGHT_PARENTHESIS = ")";
const WHITESPACE = " ";
const VERTICAL_BAR = "|";
const PADDING_BETWEEN_TOWERS = 50;

/*
 * Вспомогательная функция для создания
 * символов для печати в строку в консоли
 */
function createStringOfTower(string $flag, int $i): string
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
function createOriginalTower(int $countOfBlocks): array
{
    $countOfBlocks = (int)$countOfBlocks;
    $towerWithoutDisks = [];
    for ($i = 0; $i <= $countOfBlocks; $i++) {
        if ($i <= $countOfBlocks) {
            $towerWithoutDisks[] = createStringOfTower("createwithout", $i);
        }
    }
    return $towerWithoutDisks;
}

/*
 * Создаёт пирамиду с дисками
 * принимает int $countOfDisks = кол-ву дисков
 */
function createTowerWithDisks(int $countOfDisks): array
{
    $countOfBlocks = (int)$countOfDisks;
    $towerWithDisks = [];
    for ($i = 0; $i <= $countOfDisks; $i++) {
        $stringOfTower = "";
        if ($i === 0) {
            $towerWithDisks[] = createStringOfTower("createwith", $i);
        } else {
            $towerWithDisks[] = createStringOfTower("createwith", $i);
        }
    }
    return $towerWithDisks;
}

/*
 * Создаёт экземппляр пирамиды с дисками, 2 экземпляра пирамиды без дисков
 */
function createExamplesOfTower(array $pyrWithDisks, array $pyrWithoutDisks): array
{
    $towerWithDisks = $pyrWithDisks;
    $towerTwo = $pyrWithoutDisks;
    $towerThree = $pyrWithoutDisks;

    foreach ($towerWithDisks as $key => $value) {
        $firstTowerWithDisks = str_pad($value, PADDING_BETWEEN_TOWERS, WHITESPACE, STR_PAD_BOTH);
        $secondTowerWithoutDisks = str_pad($towerTwo[$key], PADDING_BETWEEN_TOWERS, WHITESPACE, STR_PAD_BOTH);
        $thirdTowerWithoutDisks = str_pad($towerThree[$key], PADDING_BETWEEN_TOWERS, WHITESPACE, STR_PAD_BOTH) . PHP_EOL;
    }

    $arrOfPyr = [
        [$towerWithDisks],
        [$towerTwo],
        [$towerThree]
    ];

    return $arrOfPyr;
}

/*
 * Функция принимает массив массивов
 * находит по индексам массивов заданные
 * запаковывает их и отправляет
 */
function chooseTowers(array $inputArr, int $firstPyr, int $secondPyr): array
{
    $allowedValues = [1, 2, 3];
    $outputArr = [];

    while (true) {
        if ((in_array($firstPyr, $allowedValues, true)) || (in_array($secondPyr, $allowedValues, true))) {
            $firstPyr = (int)$firstPyr - 1;
            $secondPyr = (int)$secondPyr - 1;
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
function arrayReplace(array $initArr, array $modArr): array
{
    $replacedArray = array_replace_recursive($initArr, $modArr);
    return $replacedArray;
}

/*
 * Функция выводит полученный массив в консоль
 */
function printTowers(array $array): void
{
    [$arr1, $arr2, $arr3] = $array;
    foreach ($arr1 as $key => $arr) {
        foreach ($arr as $k => $value) {
            $left = str_pad($value, PADDING_BETWEEN_TOWERS, WHITESPACE, STR_PAD_BOTH);
            $middle = str_pad($arr2[$key][$k], PADDING_BETWEEN_TOWERS, WHITESPACE, STR_PAD_BOTH);
            $right = str_pad($arr3[$key][$k], PADDING_BETWEEN_TOWERS, WHITESPACE, STR_PAD_BOTH) . PHP_EOL;
            print_r($left . $middle . $right);
        }
    }
}

/*
* Функция для создания трёх пирамид
*/
function createTowers(int $length): array
{
    $towerWithoutDisks = createOriginalTower((int)$length);
    $towerWithDisks = createTowerWithDisks((int)$length);
    $initArrOfArrs = createExamplesOfTower($towerWithDisks, $towerWithoutDisks);

    return $initArrOfArrs;
}

/*
* Функция для перемещения выбранного элемента с пирамиды A на пирамиду B
*/
function moveElement(array $array, int $firstPyr, int $secondPyr): array
{
    $chosenTowers = chooseTowers($array, (int)$firstPyr, (int)$secondPyr);
    $changedElemOfArr = changeElements($chosenTowers);
    $mergedArrays = arrayReplace($array, $changedElemOfArr);

    return $mergedArrays;
}
