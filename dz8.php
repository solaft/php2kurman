//1. Написать аналог «Проводника» в Windows для директорий на сервере при помощи итераторов.
<!doctype html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Directory Iterator</title>
    <style>
        a {
            text-decoration: none;
            color: red;
        }
    </style>
</head>
<body>

</body>
</html>
<?php

function getDirectory($dir)
{
    $currentDirectory = new DirectoryIterator(realpath($dir));
    getContent($currentDirectory);
}

function getContent($currentDirectory)
{
    foreach ($currentDirectory as $item) {
        if ($item->isDot()) continue;
        if (!$item->isDir()) echo "<img src='image/file.png' alt='#' width='15px'>{$item->getBaseName()}<br>";
        else echo "<img src='image/folder.png' alt='#' width='15px'><a href='?path={$item->getPathname()}'>{$item}</a><br>";
    }
}

if (!empty($_GET['path'])) {
    getDirectory($_GET['path']);
} else {
    getDirectory('/');
}
//2. Определить сложность следующих алгоритмов:
//поиск элемента массива с известным индексом,
//дублирование массива через foreach,
//рекурсивная функция нахождения факториала числа.
<?php
/* А)Поиск элемента массива с известным индексом */

$array = [1, 2, 3]; /* берем массив */

$findNumber = $array[0]; /* индекс известен => сложность O(1) */
//Б)
$array1 = [];
foreach ($array as $value) { /* O(N) */
    $array1[] = $value; /* O(1) */
    /* 
    сложность - O(N) * O(1) = O(1N)
    в итоге - O(N) */
}

/* В) Рекурсивная функция нахождения факториала числа */

function factorial($x) {
    if ($x === 0)
        return 1;
    return $x * factorial($x-1);
}
echo factorial(5);
/* Сложность рекурсивной функции зависит от количества итераций рекурсии=>
получим O(5N) 
Итого: O(N)*/
//3.
for ($i = 0; $i < $n; $i++) { /* сложность О(N)*/
        for ($j = 1; $j < $n; $j *= 2) { /* O(N) */
            $array[$i][$j] = true;
            /* 1*2=1
               2*2=4
               4*2=8
               8*2=16
               16*2=32
               32*2=64
               64*2=128 > 100 = false */
             /* O(1) */
        }
    }
    /* Итог: O(N * N) = O(n^2);
   Всего итераций - 700 */
    
    $n = 100; 
    $array[] = []; 
    
    for ($i = 0; $i < $n; $i += 2) {
        for ($j = $i; $j < $n; $j++) {
            echo($array[$i] = $i); /* O(1) */
        }
    }
    /* Итог: сложность O(N^2) */