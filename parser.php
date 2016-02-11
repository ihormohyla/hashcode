<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 11.02.16
 * Time: 20:37
 */

$file = file_get_contents('./busy_day.in');
//echo $file;
$lines = explode("\n ", $file);

$X = 0;
$Y = 0;
$droneCount = 0; //кількість дронів
$turnsCount = 0; //кількість ходів
$maxPayload = 0; //максимальна масса
$productsWeight  = [];
$warehousesCount = 0;
$allWarehouses = [];
$productsTypes = 0;
$ordersCount = 0;
$allOrders = [];


$handle = fopen('./busy_day.in', "r");
$key = 0;
while (($line = fgets($handle)) !== false) {
    $arr = explode(' ', $line);
    foreach ($arr as $k => $v) {
        switch($key){
            case 0:
                switch($k){
                    case 0:
                        $X = intval($v);
                        break;
                    case 1:
                        $Y = intval($v);
                        break;
                    case 2:
                        $droneCount = intval($v);
                        break;
                    case 3:
                        $turnsCount = intval($v);
                        break;
                    case 4:
                        $maxPayload = intval($v);
                        break;
                    default:
                        break;
                }
                break;
            case 1:
                $productsTypes = intval($v);
                break;
            case 2:
                $productsWeight = $arr;
                break;
            case 3:
                $warehousesCount = intval($v);
                break;
            case (4+($warehousesCount * 2) > $key): //
                if(count($arr) === 2){
                    $warehouseName = $arr[0] . 'x' . $arr[1];
                }elseif(count($arr) === $productsTypes){
                    $warehouseVal = $arr;
                }
                $allWarehouses[$warehouseName] = $arr;
                break;
            case (4+($warehousesCount * 2)):
                $ordersCount = intval($v);
                break;
            case (4+($ordersCount * 3) > $key && (5+($warehousesCount * 2))):
                if(count($arr) === 2){
                    $orderName = $arr[0] . 'x' . $arr[1];
                }elseif(count($arr) === 1){
                    $orderProductCount = intval($v);
                }elseif(count($arr) === $orderProductCount){
                    $allOrders[$orderName] = $arr;
                }
                break;
            default:
                break;
        }
    }
    $key++;
}



//$productsWeight[index]
echo 'X===>' . $X . "\n";
echo 'Y===>' . $Y . "\n";
echo '$droneCount===>' . $droneCount . "\n";
echo '$turnsCount===>' . $turnsCount . "\n";
echo '$maxPayload===>' . $maxPayload . "\n";
echo '$productsTypes===>' . $productsTypes . "\n";
echo '$warehousesCount===>' . $warehousesCount . "\n";
echo '$ordersCount===>' . $ordersCount . "\n";
//echo '$warehousesCount===>'; var_dump($allWarehouses); echo "\n";
//echo '$allOrders===>'; var_dump($allOrders); echo "\n";
