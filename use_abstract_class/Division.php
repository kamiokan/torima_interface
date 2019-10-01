<?php

namespace BinaryOperation3\Operator;

use BinaryOperation3\StandardOperator;

require_once "StandardOperator.php";

/**
 * 除算です。
 */
class Division extends StandardOperator
{
    public function getChoiceString()
    {
        return "除算";
    }

    public function calculate($value1, $value2)
    {
        if ($value2 == 0) {
            // 0除算
            $this->error_message = "0で割ることはできません。" . PHP_EOL;
            return;
        }
        $this->expression = $value1 . " ÷ " . $value2;
        $this->result = floor($value1 / $value2) . "(余り " . $value1 % $value2 . ")";
        $this->error_message = NULL;
    }
}
