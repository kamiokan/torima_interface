<?php

namespace BinaryOperation3\Operator;

use BinaryOperation3\StandardOperator;

require_once "StandardOperator.php";

/**
 * 乗算です。
 */
class Multiplication extends StandardOperator
{
    public function getChoiceString()
    {
        return "乗算";
    }

    public function calculate($value1, $value2)
    {
        $this->expression = $value1 . " × " . $value2;
        $this->result = $value1 * $value2;
    }
}
