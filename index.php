<?php
$numbers = array(-3,-2,-4,-4,-2,-1,-7,6);               //обьявляем массив
$numbers = array_unique($numbers);                      //удаляем одинаковые
unset($numbers[array_search(max($numbers),$numbers)]);  //удаляем максимальный элемент
$max = max($numbers);                                   //находим новый максимальный элемент
echo $max; 