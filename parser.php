<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 11.02.16
 * Time: 20:37
 */

$file = file_get_contents('./busy_day.in');
//echo $file;
$lines = explode('\n', $file);

$X = 0;
$Y = 0;
$droneCount = 0; //кількість дронів
$turnsCount = 0; //кількість ходів
$maxPayload = 0; //максимальна масса

$productsType = 0;

foreach($lines as $key => $val){
    $line = explode(' ', $val);
    foreach ($line as $k => $v) {
        if($key === 0 && $k === 0){
            $X = $v;
        }

        if($key === 0 && $k === 1){
            $Y = $v;
        }

        if($key === 0 && $k === 2){
            $droneCount = $v;
        }

        if($key === 0 && $k === 3){
            $turnsCount = $v;
        }

        if($key === 0 && $k === 4){
            echo $v;
//            $maxPayload = $v;
        }
    }
}
//
//echo 'X===>' . $X . "\n";
//echo 'Y===>' . $Y . "\n";
//echo '$droneCount===>' . $droneCount . "\n";
//echo '$turnsCount===>' . $turnsCount . "\n";
//echo '$maxPayload===>' . $maxPayload . "\n";
