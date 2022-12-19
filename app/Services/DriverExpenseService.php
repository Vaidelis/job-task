<?php

namespace App\Services;

class DriverExpenseService
{
    public function calculateDriverExpenses(array $drivers, array $expenses)
    {
        $result = [];

        // Write your logic here.
        $totalprice = array_sum($expenses);
        $driver1 = 0; // 1st driver expensis sum
        $driver2 = 0; // 2st driver expensis sum
        for($i = 0; $i < count($expenses); $i++) {

            $divine = round($driver1 - $driver2, 2); // differences between drivers expensis
            if (round($driver1, 2) == round($driver2,2) || $divine == 0.01) { //if drivers expensis sum is equal or differences is 0.01 euros
                $t = array_values($expenses)[$i] / 2;
                if (round($t, 2) == $t) { //check if decimal has 2 numbers after decimal point
                    $result[array_keys($expenses)[$i]] = array('key1' => array_values($expenses)[$i] / 2, 'name1' => $drivers[0],
                        'key2' => array_values($expenses)[$i] / 2, 'name2' => $drivers[1]);
                    $driver1 = $driver1 + array_values($expenses)[$i] / 2;
                    $driver2 = $driver2 + array_values($expenses)[$i] / 2;
                }
                else if($divine == 0.01){ //if drivers sum is not equal and difference is 0.01, then use this method, to give second driver 0.01 euros more
                    $b = round(array_values($expenses)[$i] / 2, 2);
                    $result[array_keys($expenses)[$i]] = array('key1' => $b - 0.01, 'name1' => $drivers[0],
                        'key2' => $b, 'name2' => $drivers[1]);
                    $driver1 = $driver1 + $b - 0.01;
                    $driver2 = $driver2 + $b;
                }
                else {
                    $b = round(array_values($expenses)[$i] / 2, 2);
                    $result[array_keys($expenses)[$i]] = array('key1' => $b, 'name1' => $drivers[0],
                        'key2' => $b - 0.01, 'name2' => $drivers[1]);
                    $driver1 = $driver1 + $b;
                    $driver2 = $driver2 + $b - 0.01;
                }
            }
            else{ //if drivers expenses is not equal
                $t = array_values($expenses)[$i] / 2;
                if (round($t, 2) == $t) { //check if expensis is divined by twy and has 2 numbers after decimal point
                    $result[array_keys($expenses)[$i]] = array('key1' => array_values($expenses)[$i] / 2 - 0.01, 'name1' => $drivers[0],
                        'key2' => array_values($expenses)[$i] / 2 + 0.01, 'name2' => $drivers[1]);
                    $driver1 = $driver1 + array_values($expenses)[$i] / 2 - 0.01;
                    $driver2 = $driver2 + array_values($expenses)[$i] / 2 + 0.01; //expensis sum is not equal, so 2nd driver gets 0.01 euros more than 1st driver
                } else {
                    $b = round(array_values($expenses)[$i] / 2, 2);
                    $result[array_keys($expenses)[$i]] = array('key1' => $b - 0.01, 'name1' => $drivers[0],
                        'key2' => $b, 'name2' => $drivers[1]);
                    $driver1 = $driver1 + $b - 0.01;
                    $driver2 = $driver2 + $b; //expensis sum is not equal, so first driver gets 0.01 euros less
                }

            }
        }
        //dd($result, $expenses, $totalprice, $driver1, $driver2);
        return $result;
    }
}
