<?php

namespace AZDhebar\ValidateEan;

class ValidateEan
{
    // Build your next great package.

    /**
     * Constructor
     *
     * @return void
     */
    public function __contruct(){
        
    }

    /**
     * Function Validate Ean 
     * It's responsible for validating EAN8 and EAN13
     *
     * @param [number] $value
     * @return boolean
     */
    public static function validateEan($value):bool
    {
        if (! is_numeric($value)) {
            return false;
        }

        if(!isset($value)){
            return false;
        }

        switch(strlen($value)){
            case 8:

                $digits = str_split($value);


                // 1. Add the values of the digits in the 
                // even-numbered positions: 2, 4, 6, etc.
                $even_sum = $digits[1] + $digits[3] + $digits[5];


                // 2. Add the values of the digits in the 
                // odd-numbered positions: 1, 3, 5, 7 etc.
                $odd_sum = $digits[0] + $digits[2] + $digits[4] +  $digits[6];


                // 3. ( 10 - [ (3 * Odd + Even) modulo 10 ] ) modulo 10
                $check_digit =  (10 -  ((3 * $odd_sum + $even_sum) % 10 ))  % 10;



                // if the check digit and the last digit of the 
                // barcode are OK return true;
                if ($check_digit == $digits[7]) {
                    return true;
                }

                return false;

                
            case 13:
                $digits = str_split($value);

                // 1. Add the values of the digits in the 
                // even-numbered positions: 2, 4, 6, etc.
                $even_sum = $digits[1] + $digits[3] + $digits[5] +
                            $digits[7] + $digits[9] + $digits[11];

                // 2. Multiply this result by 3.
                $even_sum_three = $even_sum * 3;

                // 3. Add the values of the digits in the 
                // odd-numbered positions: 1, 3, 5, etc.
                $odd_sum = $digits[0] + $digits[2] + $digits[4] +
                        $digits[6] + $digits[8] + $digits[10];

                // 4. Sum the results of steps 2 and 3.
                $total_sum = $even_sum_three + $odd_sum;

                // 5. The check character is the smallest number which,
                // when added to the result in step 4, produces a multiple of 10.
                $next_ten = (ceil($total_sum / 10)) * 10;
                $check_digit = $next_ten - $total_sum;

                // if the check digit and the last digit of the 
                // barcode are OK return true;
                if ($check_digit == $digits[12]) {
                    return true;
                }

                return false;
            default:
                return false;
        }
        
    }
}
