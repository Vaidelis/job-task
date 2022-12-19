<?php

namespace App\Services;

class DriverExpenseService
{
    public function calculateDriverExpenses(array $drivers, array $expenses)
    {
        $result = [];

        // Write your logic here.
        $totalprice = array_sum($expenses);
        $driver1 = 0;
        $driver2 = 0;
        for($i = 0; $i < count($expenses); $i++) {

            $divine = round($driver1 - $driver2, 2);
            if (round($driver1, 2) == round($driver2,2) || $divine == 0.01) {
                $t = array_values($expenses)[$i] / 2;
                if (round($t, 2) == $t) {
                    $result[array_keys($expenses)[$i]] = array('key1' => array_values($expenses)[$i] / 2, 'name1' => $drivers[0],
                        'key2' => array_values($expenses)[$i] / 2, 'name2' => $drivers[1]);
                    //dd($t, $d);
                    $driver1 = $driver1 + array_values($expenses)[$i] / 2;
                    $driver2 = $driver2 + array_values($expenses)[$i] / 2;
                }
                else if($divine == 0.01){
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
            else{
                $t = array_values($expenses)[$i] / 2;
                if (round($t, 2) == $t) {
                    $result[array_keys($expenses)[$i]] = array('key1' => array_values($expenses)[$i] / 2 - 0.01, 'name1' => $drivers[0],
                        'key2' => array_values($expenses)[$i] / 2 + 0.01, 'name2' => $drivers[1]);
                    //dd($t, $d);
                    $driver1 = $driver1 + array_values($expenses)[$i] / 2 - 0.01;
                    $driver2 = $driver2 + array_values($expenses)[$i] / 2 + 0.01;
                } else {
                    $b = round(array_values($expenses)[$i] / 2, 2);
                    $result[array_keys($expenses)[$i]] = array('key1' => $b - 0.01, 'name1' => $drivers[0],
                        'key2' => $b, 'name2' => $drivers[1]);
                    $driver1 = $driver1 + $b - 0.01;
                    $driver2 = $driver2 + $b;
                }

            }
        }
        //dd($result, $expenses, $totalprice, $driver1, $driver2);
        return $result;
    }
}
