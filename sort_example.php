<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 11.02.16
 * Time: 22:38
 */

$ar = array(
    '2x1' => [1,2,3,1],
    '5x3' => [1,2,2],
    '3x15' => [6,1,4,4,4],
    '5x11' => [6,2,1,5,1,6,1396]
);


array_multisort(array_map('count', $ar), SORT_ASC, $ar);
var_dump($ar);