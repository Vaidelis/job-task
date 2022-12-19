<?php

namespace App\Services;

class DriverExpenseService
{
    public function calculateDriverExpenses(array $drivers, array $expenses)
    {
        $result = [];

        // Write your logic here.
        $driver1 = 0; // 1st driver expensis sum
        $driver2 = 0; // 2st driver expensis sum
        for($i = 0; $i < count($expenses); $i++) {

            $divine = round($driver1 - $driver2, 2); // differences between drivers expensis
            if (round($driver1, 2) == round($driver2,2) || $divine == 0.01) { //if drivers expensis sum is equal or differences is 0.01 euros
                $dividednumber = array_values($expenses)[$i] / 2;
                if (round($dividednumber, 2) == $dividednumber) { //check if decimal has 2 numbers after decimal point
                    $result[array_keys($expenses)[$i]] = array('key1' => array_values($expenses)[$i] / 2, 'name1' => $drivers[0],
                        'key2' => array_values($expenses)[$i] / 2, 'name2' => $drivers[1]);
                    $driver1 = $driver1 + array_values($expenses)[$i] / 2;
                    $driver2 = $driver2 + array_values($expenses)[$i] / 2;
                }
                else if($divine == 0.01){ //if drivers sum is not equal and difference is 0.01, then use this method, to give second driver 0.01 euros more
                    $roundednumber = round(array_values($expenses)[$i] / 2, 2);
                    $result[array_keys($expenses)[$i]] = array('key1' => $roundednumber - 0.01, 'name1' => $drivers[0],
                        'key2' => $roundednumber, 'name2' => $drivers[1]);
                    $driver1 = $driver1 + $roundednumber - 0.01;
                    $driver2 = $driver2 + $roundednumber;
                }
                else {
                    $roundednumber = round(array_values($expenses)[$i] / 2, 2);
                    $result[array_keys($expenses)[$i]] = array('key1' => $roundednumber, 'name1' => $drivers[0],
                        'key2' => $roundednumber - 0.01, 'name2' => $drivers[1]);
                    $driver1 = $driver1 + $roundednumber;
                    $driver2 = $driver2 + $roundednumber - 0.01;
                }
            }
            else{ //if drivers expenses is not equal
                $dividednumber = array_values($expenses)[$i] / 2;
                if (round($dividednumber, 2) == $dividednumber) { //check if expensis is divined by twy and has 2 numbers after decimal point
                    $result[array_keys($expenses)[$i]] = array('key1' => array_values($expenses)[$i] / 2 - 0.01, 'name1' => $drivers[0],
                        'key2' => array_values($expenses)[$i] / 2 + 0.01, 'name2' => $drivers[1]);
                    $driver1 = $driver1 + array_values($expenses)[$i] / 2 - 0.01;
                    $driver2 = $driver2 + array_values($expenses)[$i] / 2 + 0.01; //expensis sum is not equal, so 2nd driver gets 0.01 euros more than 1st driver
                } else {
                    $roundednumber = round(array_values($expenses)[$i] / 2, 2);
                    $result[array_keys($expenses)[$i]] = array('key1' => $roundednumber - 0.01, 'name1' => $drivers[0],
                        'key2' => $roundednumber, 'name2' => $drivers[1]);
                    $driver1 = $driver1 + $roundednumber - 0.01;
                    $driver2 = $driver2 + $roundednumber; //expensis sum is not equal, so first driver gets 0.01 euros less
                }

            }
        }
        return $result;
    }
}
