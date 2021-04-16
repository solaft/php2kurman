<?php
//1. Создать массив на миллион элементов и отсортировать его различными способами. Сравнить скорости.
foreach (range(0, 10000000) as $number) {
    echo $number;
}

//сортируем массив ПирамидальноЙ сортировкой


function heapify(&$number, $countNumber, $i)
{
$largest = $i;
$left = 2*$i + 1; 
$right = 2*$i + 2;

if ($left < $countNumber && $number[$left] > $number[$largest])
 $largest = $left;
if ($right < $countNumber && $number[$right] > $number[$largest])
 $largest = $right;
if ($largest != $i)
{
 $swap = $number[$i];
 $number[$i] = $number[$largest];
 $number[$largest] = $swap;
 heapify($number, $countNumber, $largest);
}
}
function heapSort(&$number)
{
$countNumber = count($number);
for ($i = $countNumber / 2 - 1; $i >= 0; $i--)
 heapify($number, $countNumber, $i);
for ($i = $countNumber-1; $i >= 0; $i--)
{
 $temp = $number[0];
 $number[0] = $number[$i];
 $number[$i] = $temp;
 heapify($number, $i, 0);
}
}
function printArray(&$number)
{
$countNumber = count($number);
for ($i = 0; $i < $countNumber; ++$i)
 echo ($number[$i]." ") ;

}
echo 'Отсортированный массив: ' . PHP_EOL;
printArray($number);

// быстрая сортировка 


function quickSort(&$number, $low, $high) {
    $i = $low;                
    $j = $high;
    $middle = $number[ ( $low + $high ) / 2 ];
    do {
        while($number[$i] < $middle) ++$i;  
         while($number[$j] > $middle) —$j;   
            if($i <= $j){           
            $temp = $number[$i];
            $number[$i] = $number[$j];
            $number[$j] = $temp;
            $i++; $j--;
        }
    }
    while($i < $j);
    if($low < $j){
      quickSort($arr, $low, $j);
    }
    if($i < $high){
      quickSort($arr, $i, $high);
    }
}

// быстрая сортировка > пирамиальной 

//2. Реализовать удаление элемента массива по его значению. Обратите внимание на возможные дубликаты!

foreach (range(0, 10000000) as $number) {
    echo $number;
}
$remove = number(76);
$result = number_diff($array, $remove); 