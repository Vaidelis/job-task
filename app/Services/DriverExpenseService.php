<?php

namespace App\Services;

class DriverExpenseService
{
    public function calculateDriverExpenses(array $drivers, array $expenses)
    {
        $result = [];
        $totalprice = array_sum($expenses);

        // Write your logic here.
        for($i = 0; $i < count($expenses); $i++)
        {
                if(array_values($expenses)[$i] % 2){
                    $t = array_values($expenses)[$i] / 2;
                    if(round($t, 2) == $t) {
                        $result[array_keys($expenses)[$i]] = array('key1' => array_values($expenses)[$i] / 2, 'name1' => $drivers[0],
                            'key2' => array_values($expenses)[$i] / 2, 'name2' => $drivers[1]);
                        print_r(0);
                    }
                }
                else {
                    $result[array_keys($expenses)[$i]] = array('key1' => 0, 'name1' => $drivers[0],
                        'key2' => 0, 'name2' => $drivers[1]);
                    print_r(1);
                }
        }
        dd($result, $expenses, $totalprice);
        return $result;
    }
}
