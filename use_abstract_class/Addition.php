<?php

namespace BinaryOperation3\Operator;

use BinaryOperation3\StandardOperator;

require_once "StandardOperator.php";

/**
 * 加算です。
 */
class Addition extends StandardOperator
{
    public function getChoiceString()
    {
        return "加算";
    }

    public function calculate($value1, $value2)
    {
        $this->expression = $value1 . " ＋ " . $value2;
        $this->result = $value1 + $value2;
    }
}
