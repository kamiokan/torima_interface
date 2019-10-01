<?php

namespace BinaryOperation3\Operator;

use BinaryOperation3\StandardOperator;

require_once "StandardOperator.php";

/**
 * 累乗です。
 */
class Power extends StandardOperator
{
    public function getChoiceString()
    {
        return "累乗";
    }

    public function calculate($value1, $value2)
    {
        $this->expression = $value1 . " ^ " . $value2;
        $this->result = pow($value1, $value2);
    }
}
